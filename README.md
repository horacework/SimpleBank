# SimpleBank
A very simple bank web for my curriculum design.

Project has been checked by teacher who was in charge.No more update , but still receives issue or PR.

The improvement direction:
1.Reorganizing redundant code
2.Add new function
3.Add comments

If you need this project code to deal with your course design, please give me a star. thanks!

#广东某工业大学数据库课程设计

基本功能如下：

1）登录页面：输入卡号和密码，根据用户输入的卡号和密码，到后台数据库查询，若正确则登录成功，并保存卡好信息已备后用。若卡号存在和密码不匹配或无该卡号已经注销，提示该卡号已存在或已注销，保持界面不变等待用户的重新输入。

2）储蓄卡开户：用户输入新储蓄卡的所有信息，将该信息保存到数据库中，并将开户金额作为该卡的第一次存款记录存人数据库。

3）存款业务：从登录界面得到卡号，并提供数据输入界面，等待用户的输入存款金额。从后台数据库中找到该用户余额记录，修改余额，并将该存款事件的相应信息写人数据库，同时将存钱的金额显示在页面上。

4）取款业务：从登录界面得到卡号，并提供数据输入界面，等待用户输入取款金额，如果取款金额大于该用户卡上的余额则不能取款，或者将新的余额写人数据库，并将本次取款事件写入数据库同时将取钱的金额显示在页面上。

5）查询余额：从登录界面得到卡号，把该卡上的余额显示到界面中；

6）查询历史记录：从登录界面得到卡号，把该卡的所有存款取款信息查询出来，并显示在页面上。

7）卡注销：从登录界面得到卡号，把该卡的余额信息查询出来，并将所有余额取出（作为一次取款事件存款数据库），并将该储蓄卡的余额该为0，状态为注销，最后关闭整个系统。


