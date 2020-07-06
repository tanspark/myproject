#ifndef PLUGINMANAGER_H
#define PLUGINMANAGER_H

#include <QObject>
#include <QDir>
#include <QFileInfo>

#include <QApplication>
#include <QPluginLoader>
#include <QDesignerCustomWidgetInterface>

#include <QDebug>

class PluginManager : public QObject
{
    Q_OBJECT
public:
    explicit PluginManager(QObject *parent = 0);

    static PluginManager* getInstance();

    QStringList getList();
    QWidget* getPlugin(QString pluginFileName, QWidget *parent);

signals:

public slots:

private:
    void init();
    int findDll(QString path);

private:
    QStringList pathList;   //存储插件路径列表
    static PluginManager* instance;
};

#endif // PLUGINMANAGER_H
