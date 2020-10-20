
#pragma once
#include "Participants.h"
#include "Bidder.h"

Participants::Participants()
{

}

Participants::Participants(const string& name, const int& phone)
{
	this->name = name;
	this->phone = phone;
}

void Participants::setData(vector<AuctionItem *> listOfItem)
{
	this->listOfItem = listOfItem;
}

void Participants::setName(const string& name)
{
	this->name = name;
}

string Participants::getName() const
{
	return name;
}

int Participants::getPhone() const
{
	return phone;
}

void Participants::setPhone(const int& phone)
{
	this->phone = phone;
}

