#include "pluginmanager.h"

PluginManager* PluginManager::instance = NULL;

PluginManager::PluginManager(QObject *parent) : QObject(parent)
{
    init();     //获取当前插件
}

PluginManager* PluginManager::getInstance()
{
    if(instance == NULL) {
        instance = new PluginManager();
    }
    return instance;

}

void PluginManager::init()
{
    QString dirPath = QApplication::applicationDirPath();
    dirPath = dirPath.left(dirPath.lastIndexOf("/"));

    qDebug() << "==DLL PATH==" << dirPath;

    findDll(dirPath);
}

QWidget* PluginManager::getPlugin(QString pluginFileName, QWidget *parent)
{
    QPluginLoader loader(pluginFileName);

    bool b = loader.load();
    if(b) {     //插件加载成功
        qDebug("loder ok!\r\n");
    } else {    //插件加载失败
        qDebug("loder error!\r\n");
    }

    QObject *plugin = loader.instance();
    if (plugin) {
        QDesignerCustomWidgetInterface *iCustomWidgetInterface
                = qobject_cast<QDesignerCustomWidgetInterface *>(plugin);
        if( iCustomWidgetInterface ){
            QWidget *widget = iCustomWidgetInterface->createWidget(parent);
            return widget;
        }
    } else {
        qDebug("loader.instance() error\r\n");
    }

    return NULL;
}

int PluginManager::findDll(QString dirPath)
{
    QDir dir(dirPath);
    //要判断路径是否存在
    if(!dir.exists()) {
        qDebug() << "路径不存在";
        return -1;
    }

    dir.setFilter(QDir::Files | QDir::Hidden | QDir::NoSymLinks);//实现对文件的过滤
    dir.setSorting(QDir::Size | QDir::Reversed);//实现对文件输出的排序

    QFileInfoList list = dir.entryInfoList();

    for (int i = 0; i < list.size(); ++i)
    {
        QFileInfo fileInfo = list.at(i);
        QString suffix = fileInfo.suffix();

        //通过QFileInfo来实现对文件类型的过滤
        if(QString::compare(suffix, QString("dll"), Qt::CaseInsensitive) ==  0)
        {
            QString absolute_file_path = fileInfo.absoluteFilePath();
            pathList.append(absolute_file_path);
        }
    }
    return 0;
}


QStringList PluginManager::getList()
{
    return this->pathList;
}
