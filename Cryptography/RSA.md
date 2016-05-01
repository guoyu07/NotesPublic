[RSA](https://en.wikipedia.org/wiki/RSA_\(cryptosystem\))

The RSA algorithm involves four steps: [key generation](#KeyGeneration), [key distribution](#KeyDistribution), [encryption](#Encryption) and [decryption](#Decryption).

# Modular Exponentiation
[Modular Exponentiation](https://en.wikipedia.org/wiki/Modular_exponentiation)
```
The operation of modular exponentiation calculates the remainder when an integer b (the base) raised to the eth power (the exponent), be, is divided by a positive integer m (the modulus). In symbols, given base b, exponent e, and modulus m, the modular exponentiation c is: c ≡ b^e (mod m).

```

Modular exponentiation can be performed with a negative exponent e by finding the modular multiplicative inverse d of b modulo m using the extended Euclidean algorithm. That is:
```
c ≡ b^e ≡ d^(−e) mod m where e < 0 and b ⋅ d ≡ 1 mod m.
```

## Straghtforward Method to Solve Modular Exponentiation
The most straightforward method of calculating a modular exponent is to calculate be directly, then to take this number modulo m. Consider trying to compute c, given b = 4, e = 13, and m = 497:
```
c ≡ 4^13 mod 497   ,  c = 445
```

```
typedef unpredibleBigint int
int modularPow(int b, int e, int m) {       // O(e) + Memory-Cost
  int c;
  unpredibleBigint be = 1;                // it may takes much memory space                 
  for (int ei = 0; ei < e; ei++) {
    be *= b;
  }
  c = be % m
  return c;
}
```

The time required to perform the exponentiation depends on the operating environment and the processor. The method described above requires O(e) multiplications to complete.

## Memory-Efficient Method to Solve Modular Exponentiation
A second method to compute modular exponentiation requires more operations than the first method. Because the required memory is substantially less, however, operations take less time than before. The end result is that the algorithm is faster.
This algorithm makes use of the fact that, given two integers a and b, the following two equations are equivalent:
```
b^e mod m = (x * y) mod m
b^e mod m = [(x mod m)  * (y mod m)] mod m

b^e mod m = (b * b * ... * b) mod m
          = (b mod m) * b * b ...) mod m
          = (((b mod m) * b) mod m * b ... ) mod m
```

```c
int modularPow(int b, int e, int m) {       // O(e)
  int c = 1;
  for (int ei = 0; ei < e; ei++) {
    c = (b * c) % m;
  }
  return c;
}


(b * (b * ... (b * ?) % m ) % m ) %m
```
## Right-To-Left Binary Method
A third method drastically reduces the number of operations to perform modular exponentiation, while keeping the same memory footprint as in the previous method. It is a combination of the previous method and a more general principle called exponentiation by squaring (also known as binary exponentiation).
First, it is required that the exponent e be converted to binary notation. That is, e can be written as:
```
    n-1
e =  ∑   a_i * 2^i   , a_i can take the value 0 or 1. By definition, a_n − 1 = 1.
    i=0
 
e.g.   10  ==>  binary `1010` 
    
Known: 
  x^(a + b) = (x^a)^b
          ( n-1         )    n-1
  b^e = b^(  ∑ a_i * 2^i)  =  Π   (b^(2^i))^a_i
          ( i=0         )    i=0
        
So:
      n-1
  C ≡  Π   (b^(2^i))^a_i  mod m
      i=0
```
```c
int modularPow(int b, int e, int m) {       // O(log e)
  int c = 1;
  while (e > 0) {
    if (e % 2 == 1)
      c = (c * b) % m;
    e >> 1;
    b = (b * b) % m;
  }
  return c;
}
```

## Matrices Method
The Fibonacci numbers and Perrin numbers modulo n can be computed efficiently by computing Am (mod n) for a certain m and a certain matrix A. The above methods adapt easily to this application. This can be used for primality testing of large numbers n, for example. Pseudocode:

A recursive algorithm for ModExp(A, b, m) = A^b (mod m), where A is a square matrix.
```c
int matrixModPow(Matrix A, int b, int m) {
  if (b % 2 == 1)
    return (A *　matrixModPow(A, b - 1, m)) % m;
  Matrix D = matrixModPow(A, b / 2, m);
  return (D * D) % c;
}
```


# RSA 
RSA involves a public key and a private key. The public key can be known by everyone and is used for encrypting messages. The intention is that messages encrypted with the public key can only be decrypted in a reasonable amount of time using the private key.

The basic principle behind RSA is the observation that it is practical to find three very large positive integers e,d and n such that with modular exponentiation for all m:

```
  (m^e)^d 
```
and that even knowing e and n or even m it can be extremely difficult to find d.

```


[A' Private Key]



[B' Private Key]
```

## Key Generation      <a id="KeyGeneration"></a>
## Key Distribution    <a id="KeyDistribution"></a>
## Encryption          <a id="Encryption"></a>
## Decryption          <a id="Decryption"></a>
