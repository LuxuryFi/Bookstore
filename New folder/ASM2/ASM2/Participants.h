#pragma once

#include <iostream>
#include <string>
#include <vector>
#include "AuctionItem.h"


using namespace std;

class Participants {
protected:
	string name;
	int id;
	int phone;
	vector<AuctionItem*> listOfItem;
public:
	Participants();
	Participants(const string& name, const int& phone);
	virtual void update() const = 0;
	void setData(vector<AuctionItem*> listOfItem);
	string getName() const;
	void setName(const string& name);
	int getPhone() const;
	void setPhone(const int& phone);
};


class Owner : public Participants {

};

