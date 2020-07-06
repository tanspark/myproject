#-------------------------------------------------
#
# Project created by QtCreator 2020-06-05T10:15:05
#
#-------------------------------------------------

QT       += core gui network

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = TestTcpClient
TEMPLATE = app


SOURCES += main.cpp\
        mainwindow.cpp \
    network/tcpsocket.cpp

HEADERS  += mainwindow.h \
    network/tcpsocket.h

FORMS    += mainwindow.ui
