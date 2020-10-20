#include "../include/menu.h"

void Menu::run()
{
    bool running = true;
    while (running)
    {
        printMenu();
        int choice = askUser();
        doTask(choice);
        if (choice == 0)
            running = false;
    }
}
int Menu::askUser() const
{
    cout << "Choose a task: ";
    int choice;
    cin >> choice;

    return choice;
}