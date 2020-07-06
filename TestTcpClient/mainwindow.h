#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>

#include <QDebug>

#include "network/tcpsocket.h"

namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = 0);
    ~MainWindow();

public slots:
    void sl_sendMsg();
    void sl_readAll(QByteArray info);
    void sl_connected();
    void sl_disConect();

private:
    void init();

private:
    Ui::MainWindow *ui;

    MySocket *socket;

};

#endif // MAINWINDOW_H
