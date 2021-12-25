def is_prime(number: int):
    for i in range(2, number-1):
        if(number%i==0):
            return False
    return True

print("The list of prime numbers")

for number in range(2, 1000):
    if(is_prime(number)):
        print(number+"\n")