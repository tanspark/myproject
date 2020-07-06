#ifndef MAINWINDOW_H
#define MAINWINDOW_H

//#include "stdio.h"
#include "io.h"

#include <QMainWindow>

#include <QTextCodec>
#include <QTabWidget>
#include <QHBoxLayout>
#include <QStringList>


#include <QDebug>

#include "pluginmanager.h"
#include "myabstractwidget.h"


namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = 0);
    ~MainWindow();

private:
    void init();

    bool loadPlugins();

private:
    Ui::MainWindow *ui;

    QTabWidget* tabWidget;
};

#endif // MAINWINDOW_H
