#pragma once
#include <iostream>
#include <string>

using namespace std;


class AuctionItem {
private:
	string name;
	float price;
	string status;
public:
	AuctionItem();
	AuctionItem(const string& name, const float& price);
	AuctionItem(const string &name,const float &price,const string &status);
	float getPrice() const;
	string getName() const;
	string getStatus() const;
	void setPrice(const float& price);
	void setName(const string& name);
	void setStatus(const string& status);
};