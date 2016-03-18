/**
 * @see https://en.wikipedia.org/wiki/Matrix_(mathematics)
 * @see https://zh.wikipedia.org/wiki/%E8%A1%8C%E5%88%97%E5%BC%8F
 * @see http://www.tongji.edu.cn/~math/xxds/kcja/kcja_a/01.htm
 * @see http://www2.edu-edu.com.cn/lesson_crs78/self/j_0022/soft/ch0605.html
 */


      

A = [3 5 7]          1 * n    a Row Vector

    [3]   
A = [5]            m * 1     a Column Vector
    [7]

|A| = det(A) = ∑[σ∈Sn]sgn(σ)[n]T[i=1]Xi,σ(i)  
 
                   [a11 a12 .. a1n]   
                   [a21 a22 .. a2n]   
A = det(A) = |A| = [...           ]   ∈ R^m*n          a Square Matrix
                   [...           ]
                   [am1 am2 .. amn]

      [a11 a12]
|A| = [a21 a22]  = a11 * a22 - a12 * a21




```
      [a11 a12 a13]
|A| = [a21 a22 a23] 
      [a31 a32 a33]

    = a11*a22*a33 + a21*a32*a13 + a31*a12*a23 - a31*a22*a13 - a21*a12*a23 - a11*a32*a23
```

```
e.g.
Known:
                              [ a  b  0 ]
    Point(x, y) transforms by [ c  d  0 ], get the transformed P(x', y')
                              [ tx ty 1 ]

Analyze:
                          [ a  b  0 ]
    [x' y' 1] = [x y 1] * [ c  d  0 ]
                          [ tx ty 1 ]
    x' = ax + cy + tx
    y' = bx + dy + ty

Solution:
    c11 = xa + yc + 1*tx    =  ax + cy + tx
    c12 = xb + yd + 1*ty    =  bx + dy + ty
    c13 = x*0 + y*0 + 1*1   =  1

```


[AB]i,j = ai1*b1j + ai2*b2j + .. + ain*bnj = [n]∑[r=1]Ai,r * Br,j

          
[a11 .. a1n]   [b11 .. b1n]   
[..        ] * [..        ] = C , then cij = ai1*b1j + ai2*b2j + .. + ain*bnj
[am1 .. amn]   [bm1 .. bmn]   

e.g. 
  [1 2]    [5 6]       [1*5+2*7 1*6+2*8]   [19 22]
  [3 4] *  [7 8]   =   [3*5+4*7 3*6+4*8] = [43 50]
  
  [5 6]   [1 2]       [5*1+6*3 5*2+6*4]     [23 34]
  [7 8] * [3 4]   =   [7*1+8*3 7*2+8*4] =   [31 46]

so A * B may not equal B * A  



[2 3 4]   [0 1000]    [2*0+3*1+4*0 2*1000+3*100+4*10]   [3 2340]
[1 0 0] * [1 100 ]  = [1*0+0*1+0*0 1*1000+0*100+0*10] = [0 1000]
          [0 10  ]
          
[0 1000]   [2 3 4]    [1000 0 0]
[1 100 ] * [1 0 0] =  [102  3 4]
[0 10  ]              [10   0 0]



# Transpose
/**
 * @see http://www.tongji.edu.cn/~math/xxds/kcja/kcja_b/2-3.htm
 */
Assume:
      [a11 a12 ... a1n]           [x1]        [b1]
  A = [...            ]       X = [..]    B = [..]
      [am1 am2 ... amn]           [xn]        [bm]
  
  a11*x1 + a12*x2 .. a1n*x1 = b1
  ...
  am1*x1 + am2*x2 .. amn*xn = bm
  
  Then AX = B

  
The transpose of an m-by-n matrix A is the n-by-m matrix A^T

                    [a11 a12 .. a1m]
(A^T)m,n = A n,m =  [...           ]
                    [an1 an2 .. anm]

Then:                   
  1.  (A^T)^T = A
  2.  (A+B)^T = A^T + B^T
  3.  (λA)^T = λA^T
  4.  (AB)^T = B^T A^T

E.g.
   A =  [3 1]     C = [1 -0.5]    
        [4 2]         [-2 1.5]
  Then
    AC =  [1 0]       CA = [1 0]
          [0 1]            [0 1]
  
          
      
    
        
        
  