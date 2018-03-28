# from time import time

# def f(x, y):
# 	start = float('%.20f' %time())
# 	# print '%.20f' %time()
# 	print x + y
# 	end = float('%.20f' %time())
# 	print 'Time Elapsed : ', (end - start)

# f(1, 2)
# f('a', 'b')

# x = 10

# def foo():
# 	# print x
# 	global x
# 	x = 2
# 	print x

# foo()

# print x

print __import__('sys').argv

rows = 3
cols = 4
unit_size = 2
unit_upper = [' '*(unit_size-i-1) + '/' + ' '*(2*i) + '\\' + ' '*(unit_size-i-1) 
				for i in range(unit_size)]
unit_lower = [' '*(unit_size-i-1) + '\\' + ' '*(2*i) + '/' + ' '*(unit_size-i-1) 
				for i in range(unit_size)][::-1]
unit = unit_upper + unit_lower

for i in range(rows):
	for line in unit:
		print line*cols


from urllib2 import urlopen
site = urlopen('http://placekitten.com/250/350')
data = site.read()
kitten = open('kitten.jpeg', 'wb')
kitten.write(data)
kitten.close()