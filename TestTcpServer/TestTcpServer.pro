#-------------------------------------------------
#
# Project created by QtCreator 2020-06-05T10:09:26
#
#-------------------------------------------------

QT       += core gui network

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = TestTcpServer
TEMPLATE = app


SOURCES += main.cpp\
        mainwindow.cpp \
    network/tcpserver.cpp

HEADERS  += mainwindow.h \
    network/tcpserver.h

FORMS    += mainwindow.ui
