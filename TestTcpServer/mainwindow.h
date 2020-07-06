#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>

#include <QDebug>

#include "network/tcpserver.h"

namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = 0);
    ~MainWindow();

signals:
    void si_sendMsg(QByteArray);

public slots:
    void sl_listen(bool);
    void sl_connected(QString,int);
    void sl_disconnected(QString,int);
    void sl_recMsg(QByteArray);
    void sl_sendMsg();

private:
    void initConnect();

    void sl_readAll();

private:
    Ui::MainWindow *ui;

};

#endif // MAINWINDOW_H
