#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    this->init();
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::init()
{
    this->connect(ui->btnSend, SIGNAL(clicked(bool)), this, SLOT(sl_sendMsg()));

    this->socket = new MySocket(this);
    this->connect(this->socket, SIGNAL(si_connected()), this, SLOT(sl_connected()));
    this->connect(this->socket, SIGNAL(si_disConnect()), this, SLOT(sl_disConect()));
    this->connect(this->socket, SIGNAL(si_recMsg(QByteArray)), this, SLOT(sl_readAll(QByteArray)));
}

void MainWindow::sl_connected()
{
    //连接成功
    ui->le_rec->moveCursor(QTextCursor::End);
    ui->le_rec->insertPlainText("服务器连接成功\r\n");
}

void MainWindow::sl_disConect()
{
    //断开连接
    ui->le_rec->moveCursor(QTextCursor::End);
    ui->le_rec->insertPlainText("服务器断开连接\r\n");
}

void MainWindow::sl_sendMsg()
{
    //发送消息
    emit this->socket->si_sendMsg(ui->le_send->toPlainText().toLocal8Bit());
}

void MainWindow::sl_readAll(QByteArray info)
{
    ui->le_rec->moveCursor(QTextCursor::End);
    ui->le_rec->insertPlainText(QString::fromLocal8Bit(info).append("\r\n"));
}
