#include "items.h"
#include "itemsobserver.h"

void Items::attach(ItemsObserver* view)
{
	views.push_back(view);
}
void Items::notify() const
{
	for (int i = 0; i < views.size(); i++)
	{
		views[i]->update();
	}
}
