#pragma once
#include "itemsdata.h"

class ItemsObserver
{
public:
	ItemsData* data;
public:
	virtual void update() const = 0;
	void setData(ItemsData* data);
};

class OwnerView : public ItemsObserver
{
public:
	void update() const;
};

class Secretary : public ItemsObserver
{
public:
	void update() const;
};

class Bidder : public ItemsObserver
{
public:
	void update() const;
};