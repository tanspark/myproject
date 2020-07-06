#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    this->initConnect();
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::initConnect()
{
    this->connect(ui->btnSend, SIGNAL(clicked(bool)), this, SLOT(sl_sendMsg()));

    MyServer *server = new MyServer(this);
    this->connect(this, SIGNAL(si_sendMsg(QByteArray)), server, SIGNAL(si_sendMsg(QByteArray)));
    this->connect(server, SIGNAL(si_connected(QString,int)), this, SLOT(sl_connected(QString,int)));
    this->connect(server, SIGNAL(si_disConnect(QString,int)), this, SLOT(sl_disconnected(QString,int)));
    this->connect(server, SIGNAL(si_recMsg(QByteArray)), this, SLOT(sl_recMsg(QByteArray)));
    this->connect(server, SIGNAL(si_listen(bool)), this, SLOT(sl_listen(bool)));
}

void MainWindow::sl_listen(bool state)
{
    if(state) {
        ui->le_rec->moveCursor(QTextCursor::End);
        ui->le_rec->insertPlainText("监听端口成功\r\n");
    } else {
        ui->le_rec->moveCursor(QTextCursor::End);
        ui->le_rec->insertPlainText("监听端口失败\r\n");
    }
}

void MainWindow::sl_connected(QString ip, int port)
{
    ui->le_rec->moveCursor(QTextCursor::End);
    QString str = ip.append("=").append(QString::number(port).append(" 连接成功 \r\n"));
    ui->le_rec->insertPlainText(str);
}

void MainWindow::sl_disconnected(QString ip, int port)
{
    ui->le_rec->moveCursor(QTextCursor::End);
    QString str = ip.append("=").append(QString::number(port).append(" 断开连接 \r\n"));
    ui->le_rec->insertPlainText(str);
}


void MainWindow::sl_recMsg(QByteArray info)
{
    ui->le_rec->moveCursor(QTextCursor::End);
    ui->le_rec->insertPlainText(QString::fromLocal8Bit(info)+"\r\n");
}

void MainWindow::sl_sendMsg()
{
    emit si_sendMsg(ui->le_send->toPlainText().toLocal8Bit());
}
