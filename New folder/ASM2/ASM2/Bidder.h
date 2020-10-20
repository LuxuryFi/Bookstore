#pragma once
#include "Participants.h"

class Bidder : public Participants {
private:
	vector<float> history;
public:
	Bidder();
	Bidder(const string& name, const int& phone);
	void showHistory();
	void update() const;
};

