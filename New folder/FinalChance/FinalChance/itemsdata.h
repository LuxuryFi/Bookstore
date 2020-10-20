#pragma once
#include "items.h"

class ItemsData : public Items
{
protected:
	vector<string> names;
	vector<float> prices;
	vector<string> statuss;
public:
	vector<string> getNames() const;
	vector<float> getPrices() const;
	vector<string> getStatus() const;

	void addItems(const string& name, const float& prices, const string& status);
	void updateItem(const string& name,const float& prices, const string& status);
	ItemsData getData() const;
};