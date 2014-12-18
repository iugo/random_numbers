random_numbers
==============

产生一个随机号码. 用于所谓「云购」系统.

1. [功能] 生成一个随机数.  
   [功能] 验证新生成的随机数, 不与数据库中已存在数重复. 如果重复则自动重新生成.  
   [隐患] 若随机数储存达到一定额度则资源消耗大幅上升.
2. [功能] 将随机数写入数据库.
3. [功能] 随机数与手机号码身份证号码等信息挂钩.  
   [功能] 有手机号码验证.  
   [功能] 有身份证号码验证.  
   [缺陷] 没有与姓名挂钩.
4. [缺陷] 没有用户管理系统.

需要 MySQL 数据库.
