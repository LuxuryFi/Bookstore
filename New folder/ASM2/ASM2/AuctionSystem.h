#pragma once

#include "ManageSystem.h"

class AuctionSystem : public MenuProgram {
private:
	/*ManageSystem manageSystem;*/
	/*vector<Bidder*> listOfBidder;
	vector<AuctionItem*> listOfItem;*/
public:
	//vector<Bidder*> getBidders() const;
	//vector<AuctionItem*> getItems() const;
	void printMenu() const;
	void doTask(const int& choice);
	void itemList();
	void history();
	void update();
	void auctionItem();
	void notify();
	/*void link(ManageSystem abc);*/
};