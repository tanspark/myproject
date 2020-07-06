#include "tcpsocket.h"

MySocket::MySocket(QObject *parent) : QObject(parent)
{
    //新建线程执行TCP网络操作
    QThread *myThread = new QThread(this);
    this->tcpSocket = new TcpSocket();
    this->tcpSocket->moveToThread(myThread);
    myThread->start();

    //发送接口
    this->connect(this, SIGNAL(si_sendMsg(QByteArray)), this->tcpSocket, SLOT(sl_sendMsg(QByteArray)));
    //接收消息接口
    this->connect(this->tcpSocket, SIGNAL(si_recMsg(QByteArray)), this, SIGNAL(si_recMsg(QByteArray)));
    //断开连接接口
    this->connect(this->tcpSocket, SIGNAL(si_disConnect()), this, SIGNAL(si_disConnect()));
    //连接成功信号
    this->connect(this->tcpSocket, SIGNAL(si_connected()), this, SIGNAL(si_connected()));
}


//TcpSocket客户端发送实体类
TcpSocket::TcpSocket(QObject *parent) : QObject(parent)
{
    this->initConnect();
}

void TcpSocket::initConnect()
{
    //创建TcpScoket
    this->tcpSocket = new QTcpSocket(this);

    //连接断开信号
    this->connect(this->tcpSocket, SIGNAL(disconnected()), this, SLOT(sl_disConnect()));
    //接收消息信号
    this->connect(this->tcpSocket, SIGNAL(readyRead()), this, SLOT(sl_readAll()));

    //连接Tcp服务器
    this->sl_connect();
}

//连接Tcp服务器
void TcpSocket::sl_connect()
{
    //若未连接服务器，则尝试连接，等待1s检测是否连接成功
    if(this->tcpSocket->state() == QAbstractSocket::ConnectedState) {
        //连接成功
        emit si_connected();
    } else {
        this->tcpSocket->abort();
        this->tcpSocket->connectToHost(QHostAddress::LocalHost, 10000);

        //等待1s再次连接服务器
        QTimer::singleShot(1000, this, SLOT(sl_connect()));
    }
}

void TcpSocket::sl_disConnect()
{
    //发送信号-断开连接
    emit si_disConnect();

    //尝试再次连接服务器
    this->sl_connect();
}

//读取Tcp网络消息
void TcpSocket::sl_readAll()
{
    QByteArray info = this->tcpSocket->readAll();
    emit si_recMsg(info);
}

//发送消息
void TcpSocket::sl_sendMsg(QByteArray info)
{
    this->tcpSocket->write(info);
}
