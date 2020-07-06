#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    QTextCodec::setCodecForLocale(QTextCodec::codecForName("UTF-8"));

    init();
}

MainWindow::~MainWindow()
{
    delete ui;
}

/**
 * @brief MainWindow::init  初始化程序
 */
void MainWindow::init()
{
//    this->showFullScreen();
    this->setGeometry(20, 40, 600, 500);

    int width = this->frameGeometry().width();
    int heigth = this->frameGeometry().height();
    int x = this->frameGeometry().x();
    int y = this->frameGeometry().y();

    qDebug() << "=width:" << width << "heigth:" << heigth << "x:" << x << "y:" << y;

    tabWidget = new QTabWidget(this);
    tabWidget->setGeometry(x + 50, y + 50, width / 2, heigth / 2);

    QHBoxLayout *layout = new QHBoxLayout(this);
    layout->addWidget(tabWidget);

    this->setLayout(layout);

    //加载插件
    this->loadPlugins();
}

bool MainWindow::loadPlugins()
{
    QStringList list = PluginManager::getInstance()->getList();

    int i= 0;
    //用迭代器的输出
    for(QList<QString>::iterator iter = list.begin(); iter != list.end(); iter++)
    {
        QWidget *widget = (QWidget*)PluginManager::getInstance()->getPlugin(list[i++], this);


        MyAbstractWidget *myWidget;
        myWidget = (MyAbstractWidget *)malloc(sizeof(MyAbstractWidget));
        memcpy(myWidget, widget, sizeof(MyAbstractWidget));

        tabWidget->addTab(widget, QString("第一个").append(QString::number(i)));

//        myWidget = (MyAbstractWidget*)widget;

//        qDebug() << "========" << myWidget->getName();

    }
}
