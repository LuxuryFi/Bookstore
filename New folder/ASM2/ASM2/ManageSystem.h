#pragma once

#include "AuctionItem.h"
#include "Participants.h"
#include "MenuProgram.h"
#include "AuctionSystem.h"
#include <stdlib.h>
#include "Bidder.h"
#include <vector>


class ManageSystem :public MenuProgram {
private:
	//AuctionSystem auctionSystem;
	vector<Bidder *> listOfBidder;
	vector<AuctionItem *> listOfItem;
public:
	void addUser();
	void addItem();
	vector<Bidder *> getBidders() const;
	vector<AuctionItem*> getItems() const;
	void printMenu() const;
	void doTask(const int& choice);
	void userList();
	void itemList();
	void deleteUser();
	void deleteItem();
	void updateUser();
	void updateItem();
	void update();
	void notify();
	/*void link(AuctionSystem abc);*/
};