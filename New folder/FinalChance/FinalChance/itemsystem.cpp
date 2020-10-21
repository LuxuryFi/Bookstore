#include "itemsystem.h"
#include "menu.h"
#include "items.h"
#include "itemsdata.h"
#include "itemsobserver.h"

void ItemSystem::printMenu() const
{
	cout << "Menu" << endl;
	cout << "1. Add Item" << endl;
	cout << "2. Change Name" << endl;
	cout << "3. Secretary View" << endl;
	cout << "4. Owner View" << endl;
	cout << "5. Bidder View" << endl;
	cout << "0. Exit" << endl;
}
void ItemSystem::doTask(const int& choice)
{
	switch (choice)
	{

	case 1: addItem();			  break;
	case 2: changeName();         break;
	case 3: secretaryView();      break;
	case 4: ownerView();          break;
	case 5: bidderView();         break;
	default: cout << "Invalid choice: " << endl;
	}
}
void ItemSystem::addItem()
{
	float price;
	string name;
	int amount;

	cout << "Number of items want to add: "; cin >> amount;
	for (int i = 0; i < amount; i++)
	{
		cout << "Enter name: ";        cin >> name;
		cout << "Enter price: ";       cin >> price;
	
		data->addItems(name, price , "Available");
		data->notify();
	}

}

void ItemSystem::changeName()
{
	string name;
	float price;

	cout << "Enter name: "; cin >> name;
	cout << "Enter price: "; cin >> price;
	data->updateItem(name,price, "Available");
	data->notify();
}

void ItemSystem::secretaryView()
{
	ItemsObserver* SView = new Secretary();
	SView->setData(data);
	data->attach(SView);
	data->notify();
}

void ItemSystem::ownerView()
{
	ItemsObserver* OView = new OwnerView();
	OView->setData(data);
	data->attach(OView);
	data->notify();
}

void ItemSystem::bidderView()
{
	ItemsObserver* OView = new Bidder();
	OView->setData(data);
	data->attach(OView);
	data->notify();
}