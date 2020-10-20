
#include <iostream>
#include <string>
#include <conio.h>
using namespace std;

class MenuProgram
{
public:
	void run();
protected:
	virtual void printMenu() const = 0;
	virtual void doTask(const int& choice) = 0;
	int askUser() const;
};