#include "itemsobserver.h"
#include "itemsdata.h"
#include "items.h"
#include "itemsystem.h"

#include <stdio.h>

void ItemsObserver::setData(ItemsData* data)
{
	this->data = data;
}

void OwnerView::update() const
{
	vector<string> names = data->getNames();
	vector<float> prices = data->getPrices();
	vector<string> statuss = data->getStatus();

	printf("===========Owner View===========\n");
	for (int i = 0; i < names.size(); i++)
		cout << "Name: " << names[i].c_str() << " | Price: " << prices[i] << " | Status: " << statuss[i] << endl;

}
void Secretary::update() const
{
	vector<string> names = data->getNames();
	vector<float> prices = data->getPrices();
	vector<string> statuss = data->getStatus();
	printf("~~~~~ Secretary View ~~~~~\n");
	for (int i = 0; i < names.size(); i++)
	{
		cout << "Name: " << names[i].c_str() << " | Price: " << prices[i] << " | Status: " << statuss[i] << endl;
	}

}

void Bidder::update() const 
{
	vector<string> names = data->getNames();
	vector<float> prices = data->getPrices();
	vector<string> statuss = data->getStatus();
	printf("~~~~~ Secretary View ~~~~~\n");
	for (int i = 0; i < names.size(); i++)
	{
		cout << "ID: " << i + 1 <<  " | Name: " << names[i].c_str() << " | Price: " << prices[i] << " | Status: " << statuss[i] << endl;
	}

	cout << "Choose item to bid: ";
	int choose;
	cin >> choose;


}



