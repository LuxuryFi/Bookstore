#pragma once
#include <iostream>
#include <string>
#include <vector>

using namespace std;

class BidData {

private:
	vector<string> names;
	vector<float> prices;
	float highest_price;
public:
	BidData();
	vector<string> getName() const;
	vector<float> getPrice() const;
	void addBid(const string &name,const float &price);
	float getHighestPrice() const;
};