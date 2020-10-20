#pragma once
#include <iostream>
#include <string>
#include "menu.h"
#include "items.h"
#include "itemsdata.h"
#include "itemsobserver.h"

#include <vector>
using namespace std;

class ItemSystem : public Menu
{
protected:
	ItemsData* data = new ItemsData();
	virtual void printMenu() const;
	virtual void doTask(const int& choice);
public:
	void addItem();
	void changeName();
	void ownerView();
	void secretaryView();
	void bidderView();
};