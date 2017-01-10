## Catalogue
*
*
* [Round-Robin Scheduling ��ѯ����](#round_robin_scheduling)
* [Weighted Round-Robin Scheduling Ȩ����ѯ�����㷨](#weighted_round_robin_scheduling)

# Round-Robin Scheduling ��ѯ����	<a id="round_robin_scheduling"></a>
Round-robin scheduling is simple, easy to implement, and starvation-free (��״̬).
����ѯ�����㷨�������з������Ĵ������ܶ���ͬ��������ÿ̨�������ĵ�ǰ����������Ӧ�ٶȡ������������ʱ��仯�Ƚϴ�ʱ����ѯ�����㷨���׵��·�������ĸ��ز�ƽ�⡣

�������Դ��־����㷨�ʺ��ڷ��������е����з�����������ͬ����Ӳ�����ò���ƽ������������Ծ���������
```
servers = [s0, s1, s2...]
alives = {s0: w0, s1: w1, s2: w2...}
int n = count(servers)
int i = n - 1	// last scheduled server id, initialize it to n - 1 when not set

function roundRobinScheduling() {
	while(true) {
		i = (i + 1) mod n
		if (alives[i] > 0) {
			return servers[i]
		}
	}
}

```
��ϵͳʵ��ʱ������������һ����������������������ȨֵΪ��ʱ����ʾ�÷����������ö��������ȡ���������Ŀ���ǽ��������г����������η��������Ϻ�ϵͳά������ͬʱ��������Ȩ�㷨����һ�¡�

# Weighted Round-Robin Scheduling Ȩ����ѯ�����㷨	<a id="weighted_round_robin_scheduling"></a>
���Ǹ��ݷ������Ĳ�ͬ������������ÿ�����������䲻ͬ��Ȩֵ��ʹ���ܹ�������ӦȨֵ���ķ�������
```

weights = {s0: 10, s1: 2, s2: 8, s3: 8, s4: 10}
w_gcd = gcd(10, 2, 8, 8, 10) = 2     // Greatest Common Divisor
loop1: weight>=10,  s0,             s4  
loop2: weight>=8,   s0,     s2, s3, s4
loop3: weight>=6,   s0,     s2, s3, s4
loop4: weight>=4,	s0,     s2, s3, s4
loop5: weight>=2,	s0, s1, s2, s3, s4
loop6: weight=0,	reset weight = 10

You'll find that in a period, weight=10, runs 5 times; weight=8, runs 4 times; and weight=2 runs only 1 time.

weights = {s0: 10, s1: 2, s2: 5, s3: 8, S4: 10}
w_gcd = gcd(10, 2, 5, 8, 10) = 1	
loop1: weight>=10,  s0,             s4  
loop2: weight>=9,   s0,             s4
...
loop9: weight>=2,	s0, s1, s2, s3, s4
loopX: weight>=1,	s0, s1, s2, s3, s4
loopN: weight=0,	reset weight = 10

```
```
servers = [s0, s1, s2...]
weights = {s0: w0, s1: w1, s2: w2...}		// weight = 0 when not works
int max_weight = max(weights)
int weights_gcd = gcd(weights)
int n = count(servers)
int i = n - 1

int cw = 0							// current weight
function weightedRoundRobinScheduling() {
	while(true) {
		i = (i + 1) mod n
		if (i == 0) {				// a period
			cw -= weight_gcd
			if (cw <= 0) {
				cw = max_weight
			}
		}
		if (weights[servers[i]] >= cw) {
			return servers[i];
		}
	}
}
```