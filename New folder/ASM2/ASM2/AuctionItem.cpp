#include "AuctionItem.h"

AuctionItem::AuctionItem()
{

}

AuctionItem::AuctionItem(const string& name, const float& price)
{
	this->name = name;
	this->price = price;
	this->status = "Available";
}

AuctionItem::AuctionItem(const string& name, const float& price, const string& status)
{
	this->name = name;
	this->price = price;
	this->status = status;
}


float AuctionItem::getPrice() const
{
	return price;
}

string AuctionItem::getName() const
{
	return name;
}

string AuctionItem::getStatus() const
{
	return status;
}

void AuctionItem::setPrice(const float& price)
{
	this->price = price;
}

void AuctionItem::setName(const string& name) 
{
	this->name = name;
}

void AuctionItem::setStatus(const string& status)
{
	this->status = status;
}