#pragma once

#include <iostream>
#include <string>

using namespace std;

class Menu
{
public:
    void run();
protected:
    virtual void printMenu() const = 0;
    int askUser() const;
    virtual void doTask(const int &choice) = 0;
};