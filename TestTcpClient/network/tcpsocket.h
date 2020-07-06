#ifndef TCPSOCKET_H
#define TCPSOCKET_H

#include <QObject>
#include <QThread>

#include <QTcpSocket>
#include <QHostAddress>
#include <QTimer>

#include <QDebug>

class TcpSocket : public QObject
{
    Q_OBJECT
public:
    explicit TcpSocket(QObject *parent = 0);

signals:
    void si_connected();    //连接成功
    void si_disConnect();   //连接断开
    void si_recMsg(QByteArray info);    //接收的消息

public slots:
    void sl_sendMsg(QByteArray info);   //发送消息
    void sl_readAll();      //接收消息，处理
    void sl_disConnect();   //断开连接

    void sl_connect();  //连接服务器

private:
    void initConnect();

private:
    QTcpSocket *tcpSocket;
};


class MySocket : public QObject
{
    Q_OBJECT
public:
    explicit MySocket(QObject *parent = 0);

signals:
    void si_connected();
    void si_disConnect();
    void si_sendMsg(QByteArray info);
    void si_recMsg(QByteArray info);

private:
    TcpSocket *tcpSocket;

};

#endif // TCPSOCKET_H
