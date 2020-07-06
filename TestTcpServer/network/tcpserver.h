#ifndef TCPSERVER_H
#define TCPSERVER_H

#include <QObject>
#include <QThread>

#include <QTcpServer>
#include <QTcpSocket>
#include <QHostAddress>
#include <QTimer>


class TcpServer : public QObject
{
    Q_OBJECT
public:
    explicit TcpServer(QObject *parent = 0);

signals:
    void si_listen(bool state); //监听端口状态
    void si_connected(QString ip, int port);    //连接成功
    void si_disConnect(QString ip, int port);   //连接断开
    void si_recMsg(QByteArray info);    //接收的消息

public slots:
    void sl_newConnection();    //监听新客户端连接情况

    void sl_connected();    //客户端连接成功
    void sl_disconnect(); //客户端断开连接
    void sl_recMsg();       //接收客户端消息
    void sl_sendMsg(QByteArray info);   //发送消息

private:
    void initConnect();

private:
    QTcpServer *tcpServer;
};


class MyServer : public QObject
{
    Q_OBJECT
public:
    explicit MyServer(QObject *parent = 0);

signals:
    void si_listen(bool);
    void si_connected(QString,int);
    void si_disConnect(QString,int);
    void si_recMsg(QByteArray info);
    void si_sendMsg(QByteArray info);

private:
    TcpServer *tcpServer;

};

#endif // TCPSERVER_H
