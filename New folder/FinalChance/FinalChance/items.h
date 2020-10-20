#pragma once

#include <iostream>
#include <string>
#include <vector>

using namespace std;

class ItemsObserver;

class Items
{
protected:
	vector<ItemsObserver*> views;
public:
	void attach(ItemsObserver* view);
	void notify() const;
};