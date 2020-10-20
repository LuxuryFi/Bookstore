#include "ManageSystem.h"

//void ManageSystem::link(AuctionSystem abc)
//{
//	//auctionSystem = abc;
//}

void ManageSystem::addUser() 
{
	int amount, phone;
	string name;

	cout << "Enter amount: " << endl;
	cin >> amount;

	for (int i = 0; i < amount; i++)
	{
		cout << "Enter user name: ";
		cin >> name;
		cout << "Enter user's phone: ";
		cin >> phone;

		Bidder* add = new Bidder(name, phone);
		listOfBidder.push_back(add);
		/*notify();*/
	}
}

void ManageSystem::addItem()  {
	int amount;
	float price;
	string name;

	cout << "Enter amount: " << endl;
	cin >> amount;

	for (int i = 0; i < amount; i++)
	{
		cout << "Enter item's name: ";
		cin >> name;
		cout << "Enter item's price: ";
		cin >> price;

		AuctionItem* add = new AuctionItem(name, price);
		listOfItem.push_back(add);
	}
}

vector<Bidder *> ManageSystem::getBidders() const
{
	return listOfBidder;
}

vector<AuctionItem *> ManageSystem::getItems() const
{
	return listOfItem;
}


void ManageSystem::deleteUser()
{
	userList();
	
	string search;
	cout << "Enter user name to delete: ";
	cin >> search;

	for (int i = 0; i < listOfBidder.size(); i++)
	{
		if (search == listOfBidder[i]->getName())
		{
			listOfBidder.erase(listOfBidder.begin() + i);
		/*	notify();*/
		}
	}
}
void ManageSystem::deleteItem()
{
	itemList();

	string search;
	cout << "Enter item name to delete: ";
	cin >> search;

	for (int i = 0; i < listOfItem.size(); i++)
	{
		if (search == listOfItem[i]->getName())
		{
			listOfItem.erase(listOfItem.begin() + i);
			/*notify();*/
		}
	}
}
void ManageSystem::updateUser()
{
	userList();

	string search,new_name;
	int new_phone;
	cout << "Enter user name to update: ";
	cin >> search;


	for (int i = 0; i < listOfBidder.size(); i++)
	{
		if (search == listOfBidder[i]->getName())
		{
			cout << "Enter new name: ";
			cin >> new_name;
			cout << "Enter new phone: ";
			cin >> new_phone;

			listOfBidder[i]->setName(new_name);
			listOfBidder[i]->setPhone(new_phone);
			/*notify();*/
		}
	}
}
void ManageSystem::updateItem()
{
	itemList();

	string search, new_name;
	float new_price;
	cout << "Enter item name to update: ";
	cin >> search;

	for (int i = 0; i < listOfItem.size(); i++)
	{
		cout << "Enter new name: ";
		cin >> new_name;
		cout << "Enter new phone: ";
		cin >> new_price;
		listOfItem[i]->setName(new_name);
		listOfItem[i]->setPrice(new_price);
		/*notify();*/
	}
}

void ManageSystem::userList()
{
	for (int i = 0; i < listOfBidder.size(); i++)
	{
		cout << "Name: " << listOfBidder[i]->getName() << " | Phone: " << listOfBidder[i]->getPhone() << endl;
	}
}

void ManageSystem::itemList()
{
	for (int i = 0; i < listOfItem.size(); i++)
	{
		cout << "Name: " << listOfItem[i]->getName() << " | Price: " << listOfItem[i]->getPrice() << " | Status: " << listOfItem[i]->getStatus() << endl;
	}
}

void ManageSystem::printMenu() const
{
	cin.get();
	system("CLS");
	cout << "--------Auction management system----------" << endl;
	cout << "1. Add new item" << endl;
	cout << "2. Add new user" << endl;
	cout << "3. User List" << endl;
	cout << "4. Item List" << endl;
	cout << "5. Update user" << endl;
	cout << "6. Update item" << endl;
	cout << "7. Delete user" << endl;
	cout << "8. Delete item" << endl;
	cout << "9. Auction" << endl;


}

void ManageSystem::update() 
{
	//listOfBidder = auctionSystem.getBidders();
	//listOfItem = auctionSystem.getItems();
}

void ManageSystem::notify()
{
	/*auctionSystem.update();*/
}


void ManageSystem::doTask(const int& choice)
{
	switch (choice)
	{
	
	case 1:
		system("CLS");
		addItem();
		cin.get();
		break;
	case 2:
		system("CLS");
		addUser();
		cin.get();
		break;
	case 3:
		system("CLS");
		userList();
		cin.get();
		break;
	case 4:
		system("CLS");
		itemList();
		cin.get();
		break;
	case 5:
		system("CLS");
		updateUser();
		cin.get();
		break;
	case 6:
		system("CLS");
		updateItem();
		cin.get();
		break;
	case 7:
		system("CLS");
		deleteUser();
		cin.get();
		break;
	case 8:
		system("CLS");
		deleteItem();
		cin.get();
		break;
	}
}

