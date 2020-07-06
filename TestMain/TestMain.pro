#-------------------------------------------------
#
# Project created by QtCreator 2019-01-13T16:28:04
#
#-------------------------------------------------

QT       += core gui

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = TestMain
TEMPLATE = app

greaterThan(QT_MAJOR_VERSION, 4) {
    QT += designer
} else {
    CONFIG += designer
}

SOURCES += main.cpp\
        mainwindow.cpp \
    pluginmanager.cpp

HEADERS  += mainwindow.h \
    pluginmanager.h \
    myabstractwidget.h

FORMS    += mainwindow.ui
