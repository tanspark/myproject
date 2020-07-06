#ifndef MYABSTRACTWIDGET_H
#define MYABSTRACTWIDGET_H


class MyAbstractWidget
{
public:

    virtual void initialize() = 0;
    virtual char* getIcon() = 0;
    virtual char* getName() = 0;

};

#endif // MYABSTRACTWIDGET_H
