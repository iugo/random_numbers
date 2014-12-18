random_numbers
==============

产生一个随机号码. 用于所谓「云购」系统.

1. 生成一个随机数.
  验证新生成的随机数, 不与数据库中已存在数重复. 如果重复则自动重新生成.
  若随机数储存达到一定额度则资源消耗大幅上升.
2. 将随机数写入数据库.
3. 随机数与手机号码身份证号码等信息挂钩.
  有手机号码验证.
  有身份证号码验证.
