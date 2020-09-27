#include <iostream>
using namespace std;

class Item
{
public:
       int val;
    Item *next, *pre;
    Item()
    {
        val =0;
        next=0;
        pre=0;   
    }
    Item(int val)
    {
        this->val = val;
        next=0;
        pre=0;
    }
};

class DLinkedList
{
    int size;
    Item *front;
    Item *back;   
public:
    DLinkedList() {
		size = 0;
		front = back = NULL;
	}
    DLinkedList(const DLinkedList &list);

    void push_back(Item *a);
    void push_front(Item *a);
    Item * pop_front();
    Item * pop_back();
    
    void insert(Item *a, int t);
    void insertlist(DLinkedList *list, int t);//void insertlist(const DLinkedList &list, int t);
    void display(ostream &out);
    int getSize()const
	{
		return size;
	}
    Item * getfront()const
	{
		return front;
	}
    Item * getback()const
	{
		return back;
	}
    void swap(Item *p, Item *q); //swap two items pointed by p and q, you can assume that p and q are something in the list
    Item * extractmin(Item * start); // return the pointer of the min element after  "start",
                                     // here you can assume user will always input a valid pointer start that points to an item in the list
    Item * extractmax(Item * start);  // return the pointer of the max element after "start"   
	void setSize(int s)
	{
		size = s;
	}
	void setFront(Item *f)
	{
		front = f;
	}
	void setBack(Item *b)
	{
		back = b;
	}
};

DLinkedList::DLinkedList(const DLinkedList &list)
{
	if (list.getFront() == NULL)
	{
		this->setFront(NULL);
		this->setBack(NULL);
	}
	else
	{
		this->setFront(new Item(list.front->val));
		this->setSize(this->getSize() + 1);
		Item *current = this->getFront();
		Item *objFront = list.getFront();
		Item *currentObj = objFront;
		while (currentObj->next != NULL)
		{
			current->next = new Item(currentObj->next->val);
			currentObj = currentObj->next;
			current->next->prev = current;
			current = current->next;
		}
		this->setBack(current);
	}
}

void DLinkedList::push_back(Item *a)
{
	if (this->getSize() == 0)
	{
		this->front = a;
		this->setBack(a);
	}
	else
	{
		this->getBack()->next = a;
		a->prev = this->getBack();
		this->setBack(this->getBack()->next);
	}
	this->setSize(this->getSize() + 1);
}

void DLinkedList::push_front(Item *a)
{
	if (this->getSize() == 0)
	{
		this->setFront(a);
		this->setBack(a);
	}
	else
	{
		a->next = this->getFront();
		this->getFront()->prev = a;
		this->setFront(a);
	}
	this->setSize(this->getSize() + 1);
}

Item* DLinkedList::pop_front()
{
	Item *temp = this->getFront();
	if (this->getSize() == 0)
		cout << "\nList is empty!";
	else if (this->getSize() == 1)
	{
		this->setFront(NULL);
		this->setBack(NULL);
	}
	else
	{
		this->setFront(this->getFront()->next);
		this->getFront()->prev = NULL;
	}
	free(temp);
	this->setSize(this->getSize() - 1);
}

Item* DLinkedList::pop_back()
{
	Item *temp = back;
	if (this->getSize() == 0)
		cout << "\nList is empty!";
	else if (this->getSize() == 1)
	{
		this->setFront(NULL);
		this->setBack(NULL);
	}
	else
	{
		this->setBack(this->getBack()->prev);
		this->getBack()->next = NULL;
	}
	free(temp);
	this->setSize(this->getSize() - 1);
}

void DLinkedList::insert(Item *a, int t)
{
	if (t == 0)
		push_front(a);
	else if (t<0)
		cout << "\nInvalid position!";
	else if (t == size)
		push_back(a);
	else
	{
		int i;
		Item *temp;
		if (t <= (this->getSize() / 2))
		{
			temp = this->getFront();
			for (i = 0; i<t; i++)
			{
				temp = temp->next;
			}
		}
		else
		{
			temp = this->getBack();
			for (i = 0; i<(size - t); i++)
			{
				temp = temp->prev;
			}
		}
		a->next = temp->next;
		a->prev = temp;
		temp->next = a;
		a->next->prev = a;
		this->setSize(this->getSize() + 1);
	}
}

void DLinkedList::insertlist(const DLinkedList &list, int t)
{
	if (!list.getFront())
	{
		cout << "\nThe list you want to append to the original list is empty!";
	}
	else
	{
		if (t == 0)
		{
			list.getBack()->next = this->getFront();
			this->getFront()->prev = list.getBack();
			this->setFront(list.getFront());
		}
		else if (t<0)
			cout << "\nInvalid position!";
		else if (t == this->getSize())
		{
			this->getBack()->next = list.getFront();
			list.getFront()->prev = this->getBack();
			this->setBack(list.getBack());
		}
		else
		{
			int i;
			Item *temp;
			if (t <= (this->getSize() / 2))
			{
				temp = this->getFront();
				for (i = 0; i<t; i++)
				{
					temp = temp->next;
				}
			}
			else
			{
				temp = this->getBack();
				for (i = 0; i<(this->getSize() - t); i++)
				{
					temp = temp->prev;
				}
			}
			list.getBack()->next = temp->next;
			list.getFront()->prev = temp;
			temp->next = list.getFront();
			list.getBack()->next->prev = list.getBack();
		}
	}
	this->setSize(this->getSize() + list.getSize());
}

void DLinkedList::display(ostream &out)
{
	if (this->getFront() == NULL)
		out << "List is empty!";
	else
	{
		Item *temp = this->getFront();
		while (temp)
		{
			out << temp->val << "->";
			temp = temp->next;
		}
	}
}

void DLinkedList::swap(Item *p, Item *q)
{
	int temp = p->val;
	p->val = q->val;
	q->val = temp;
}

Item* DLinkedList::extractmin(Item * start)
{
	if (start->next == NULL)
		return start;
	else
	{
		Item* min = start;
		start = start->next;
		while (start)
		{
			if (start->val<min->val)
				min = start;
		}
		return min;
	}
}

Item * DLinkedList::extractmax(Item * start)
{
	if (start->next == NULL)
		return start;
	else
	{
		Item* max = start;
		start = start->next;
		while (start)
		{
			if (start->val>max->val)
				max = start;
		}
		return max;
	}
}

class myStack
{
    DLinkedList list;
public:
    myStack();
    int getSize() {
		return list.getSize();
	}
    void in(Item *a) {
		list.push_back(a);
	}
    Item *top() {
		return list.getBack();
	}
    void out() {
		Item* poppedItem = list.pop_back();
		cout << "\nElement popped out is: " << poppedItem->val;
	}
};

class myQueue
{
    DLinkedList list;
public:
    myQueue();
    int getSize() {
		return list.getSize();
	}
    void in(Item *a) {
		list.push_front(a);
	}
    Item *front() {
		return list.getFront();
	}
    void out() {
		Item* poppedItem = list.pop_back();
		cout << "\nElement popped out is: " << poppedItem->val;
	}
};


int main()
{
	return 0;
}