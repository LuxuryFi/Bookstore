#include "AuctionSystem.h"


void AuctionSystem::printMenu() const
{
	cin.get();
	system("CLS");
	cout << "--------Auction system----------" << endl;
	cout << "1. Item List" << endl;
	cout << "2. Auction" << endl;
	cout << "3. Auction history" << endl;
	cout << "4. Exit";
}

void AuctionSystem::doTask(const int& choice)
{
	/*switch (choice)
	{
	case 1:
		system("CLS");
		itemList();
		cin.get();
		break;
	case 2:
		system("CLS");
		auctionItem();
		cin.get();
		break;
	case 3:
		system("CLS");
		history();
		cin.get();
		break;
	case 0:
		system("CLS");
		cin.get();
		break;
	default:
		system("CLS");
		cin.get();
		break;
	}*/
}

//void AuctionSystem::itemList()
//{
//	for (int i = 0; i < listOfItem.size(); i++)
//	{
//		cout << "Name: " << listOfItem[i]->getName() << " | Price: " << listOfItem[i]->getPrice() << " | Status: " << listOfItem[i]->getStatus() << endl;
//	}
//}

void AuctionSystem::history()
{
}

//void AuctionSystem::update()
//{
//	listOfBidder = manageSystem.getBidders();
//	listOfItem = manageSystem.getItems();
//}
//
//void AuctionSystem::notify()
//{
//	manageSystem.update();
//}


void AuctionSystem::auctionItem()
{

}

//void AuctionSystem::link(ManageSystem abc)
//{
//	manageSystem = abc;
//}

//vector<Bidder*> AuctionSystem::getBidders() const
//{
//	return listOfBidder;
//}
//
//vector<AuctionItem*> AuctionSystem::getItems() const
//{
//	return listOfItem;
//}
