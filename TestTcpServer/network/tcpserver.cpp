#include "tcpserver.h"

MyServer::MyServer(QObject *parent) : QObject(parent)
{
    //新建线程执行TCP网络操作
    QThread *myThread = new QThread(this);
    this->tcpServer = new TcpServer();
    this->tcpServer->moveToThread(myThread);
    myThread->start();

    //发送接口
    this->connect(this, SIGNAL(si_sendMsg(QByteArray)), this->tcpServer, SLOT(sl_sendMsg(QByteArray)));
    //监听状态接口
    this->connect(this->tcpServer, SIGNAL(si_listen(bool)), this, SIGNAL(si_listen(bool)));
    //接收消息接口
    this->connect(this->tcpServer, SIGNAL(si_recMsg(QByteArray)), this, SIGNAL(si_recMsg(QByteArray)));
    //断开连接接口
    this->connect(this->tcpServer, SIGNAL(si_disConnect(QString,int)), this, SIGNAL(si_disConnect(QString,int)));
    //连接成功信号
    this->connect(this->tcpServer, SIGNAL(si_connected(QString,int)), this, SIGNAL(si_connected(QString,int)));
}


//TcpServer服务器监听实体类
TcpServer::TcpServer(QObject *parent) : QObject(parent)
{
    //初始化
    this->initConnect();
}

void TcpServer::initConnect()
{
    //创建服务器对象
    this->tcpServer = new QTcpServer(this);
    //新客户端连接
    this->connect(this->tcpServer, SIGNAL(newConnection()), this, SLOT(sl_newConnection()));
    //启动监听端口
    bool state = this->tcpServer->listen(QHostAddress::LocalHost, 10000);
    emit si_listen(state);
    if(state) {
        //监听端口成功
    } else {
        //监听端口失败
    }

}

//新客户端连接信号
void TcpServer::sl_newConnection()
{
    //获取新连接的客户端
    QTcpSocket *tcpSocket = this->tcpServer->nextPendingConnection();
    QString ip = tcpSocket->peerAddress().toString();
    int port = tcpSocket->peerPort();
    emit si_connected(ip, port);

    //连接成功，并没有用到
    connect(tcpSocket, SIGNAL(connected()), this, SLOT(sl_connected()));
    //断开连接
    connect(tcpSocket, SIGNAL(disconnected()), this, SLOT(sl_disconnect()));
    //接收消息
    connect(tcpSocket, SIGNAL(readyRead()), this, SLOT(sl_recMsg()));

}

//客户端连接成功
void TcpServer::sl_connected()
{
    QTcpSocket* tcpSocket = dynamic_cast<QTcpSocket*>(sender());
    if( tcpSocket != NULL ) {
        QString ip = tcpSocket->peerAddress().toString();
        int port = tcpSocket->peerPort();
        emit si_connected(ip, port);
    }
}

//客户端断开连接
void TcpServer::sl_disconnect()
{
    QTcpSocket* tcpSocket = dynamic_cast<QTcpSocket*>(sender());
    if( tcpSocket != NULL ) {
        QString ip = tcpSocket->peerAddress().toString();
        int port = tcpSocket->peerPort();
        emit si_disConnect(ip, port);
    }
}

//接收客户端消息
void TcpServer::sl_recMsg()
{
    //接收的消息内容
    QTcpSocket* tcpSocket = dynamic_cast<QTcpSocket*>(sender());
    QByteArray info = tcpSocket->readAll();
    //限制连接的用户IP为目标指定，其他不接收
    if(tcpSocket->peerAddress().toString().compare("127.0.0.1") == 0) {
        //向外发送消息
        emit si_recMsg(info);
    } else {
        //其他IP发送
    }
}

//发送消息
void TcpServer::sl_sendMsg(QByteArray info)
{
    //广播发送信息
    QList<QTcpSocket *> m_tcps = this->tcpServer->findChildren<QTcpSocket *>();
    foreach (QTcpSocket *tcpSocket, m_tcps) {
        tcpSocket->write(info);
    }
}
