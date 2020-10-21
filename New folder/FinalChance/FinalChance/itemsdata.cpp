#include "itemsdata.h"



vector<string> ItemsData::getNames() const
{
	return names;
}

vector<float> ItemsData::getPrices() const
{
	return prices;
}

vector<string> ItemsData::getStatus() const
{
	return statuss;
}


void ItemsData::addItems(const string& name, const float& price, const string& status)
{
	names.push_back(name);
	prices.push_back(price);
	statuss.push_back(status);
	notify();
}

void ItemsData::updateItem(const string& name, const float& price, const string& status)
{
	int found = -1;
	for (int i = 0; i < names.size(); i++)
	{
		if (names[i] == name)
		{
			found = i;
		}
	}
	if (found != -1)
	{
		names[found] = name;
		prices[found] = price;
		statuss[found] = status;
		notify();
	}
	else
	{
		cout << "Item " << name << " is not exist!" << endl;
	}
}

void ItemsData::setPrices(vector<float> prices, vector<string> statuss)
{
	this->prices = prices;
	this->statuss = statuss;
}