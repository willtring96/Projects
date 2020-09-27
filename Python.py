'''Problem 1'''
import math
def sumOfsquares(n):
    print("Checking whether",n,"is a sum of squares...")
    for a in range(math.ceil(math.sqrt(n))):
        for b in range(math.ceil(math.sqrt(n))):
            #Check all tuple pairs (a,b) where a and b are both less than or equal to sqrt of n.
            if (a*a+b*b == n): #Checks if the tuple satisfies solution
                return (a,b)
    return False #There does not exist an (a,b) pair that satisfies the solution

print(sumOfsquares(6))
print(sumOfsquares(25))
print("\n")

'''Problem 2'''
def integercheck(cs): #Checks to make sure all integers 0 to n are in cs
    n = 0
    for ls in cs: #Finds the greatest integer in cs
        if max(ls) > n:
            n = max(ls)
    for i in range(n+1): #Checks to make sure all integers 0 to n are in cs
        found = False
        for subls in cs:
            if i in subls:
                found = True
        if found == False:
            print("The cycles in cs do NOT contain all integers in the range from 0 to",n)
            quit()

def cycle2tables(cs):
    integercheck(cs) #Checks to make sure all integers 0 to n are in cs
    n = 0
    for ls in cs: #Finds the greatest integer in cs
        if max(ls) > n:
            n = max(ls)
    images = []
    for i in range(n+1): #finds mapping beginning with 0 to n
        numcycles = len(cs) - 1 #
        mapping = i
        while numcycles>=0: #starts at the rightmost cycle
            if mapping in cs[numcycles]: #if integer exists in the cycle, get the mapping of the integer as the value in the incremented index
                index = cs[numcycles].index(mapping)+1
                if index == len(cs[numcycles]):
                    index = 0
                mapping = cs[numcycles][index] #set the new mapping to see if the cycle to the left will bring current integer to something else
            numcycles -= 1 #decrement to the cycle to the left of current cycle
        images.append(mapping) #add the mapping to the list of integers: images
    print("cycle2tables(",cs,"):")
    return images

def table2cycle(perm): #From class notes
    '''convert table to a list of disjoint cycles'''
    print("table2cycle(",perm,"):")
    to_do=perm[:]  # numbers still to be processed
    cycles=[]      # will hold the final list of cycles
    while len(to_do)>0: # not done yet...
        cycle=[]
        image=to_do[0]  # pick a starting point for a new cycle
        while not (image in cycle):
            cycle.append(image) # add element to current cycle
            to_do.remove(image) # ... and remove it from to-do list
            image=perm[image]   # find next cycle entry
        cycles.append(cycle)  # store complete cycle
    return cycles             # return result

images = cycle2tables([[0,1],[0,1,2]])
print(images)
print(table2cycle(images))
print("\n")

images = cycle2tables([[0,2],[1,4,2],[3]])
print(images)
print(table2cycle(images))
print("\n")

'''Problem 3'''
def is_prime(m): #Check if number is prime, taken from class notes
    '''return True if and only if n is a prime number'''
    n=abs(m)
    if n==1:
        return False
    if n%2==0 and n>2:
        return False
    a=True
    for i in range(3,int(n**(1/2)+1),2):
        if n%i==0:
            a=False
            break
    return a

def nearbyPrime(n):
    print("nearbyPrime("+str(n)+"):")
    if is_prime(n): #Check if n is prime
        return n
    absdistance = 1
    while True:
        dec = n-absdistance #Integer that is absolute distance less than n
        if dec<0: #If dec is negative number, set to arbitrary non prime number
            dec = n
        inc = n+absdistance #Integer that is absolute distance greater than n
        if is_prime(dec) and is_prime(inc): #Check cases whether inc, dec, or both are prime
            return (dec,inc)
        elif is_prime(dec):
            return dec
        elif is_prime(inc):
            return inc
        absdistance += 1 #Increase distance away from n to check for closest prime number

print(nearbyPrime(18))
print(nearbyPrime(3))
