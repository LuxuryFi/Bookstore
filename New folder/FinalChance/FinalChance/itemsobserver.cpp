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
	printf("~~~~~ Bidder View ~~~~~\n");
	for (int i = 0; i < names.size(); i++)
	{
		cout << "ID: " << i + 1 <<  " | Name: " << names[i].c_str() << " | Price: " << prices[i] << " | Status: " << statuss[i] << endl;
	}

	
	int choose,amount;
	int check = 1;



	do {
		cout << "Choose item to bid: ";
		cin >> choose;
		if (statuss[choose - 1] == "Soldout") check = 0;
		else if (choose == 0) break;
		else check = 1;
	} while (check == 0);

	float price, temp;
	cout << "Enter amount: ";
	cin >> amount;

	do {
		price = prices[choose-1];
		
		for (int i = 0; i < amount; i++)
		{
			cout << "User: " << i + 1 << " Enter your price: ";
			cin >> temp;

			if (temp > price) price = temp;
		}
	} while (price == 0);

	prices[choose - 1] = price;
	statuss[choose - 1] = "Soldout";
	
	data->setPrices(prices,statuss);
	

	/*data->notify();*/
}



