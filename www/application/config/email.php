<?php
/**
 * Open Labyrinth [ http://www.openlabyrinth.ca ]
 *
 * Open Labyrinth is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Open Labyrinth is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Open Labyrinth.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright Copyright 2012 Open Labyrinth. All Rights Reserved.
 *
 */
defined('SYSPATH') or die('Không được phép truy cập trực tiếp.');

return array ("mailfrom" => "admin@localhost.com", "fromname" => "Open-CVS", "email_password_reset_subject" => "Yêu cầu đặt lại mật khẩu", "email_password_reset_body" => "Xin chào <%name%>,

Một yêu cầu đã được thực hiện để đặt lại mật khẩu tài khoản \"<%username%>\" của bạn.
Để đặt lại mật khẩu, bạn cần nhấp vào URL bên dưới và tiến hành đặt lại mật khẩu.

<%link%>

Cám ơn.", "email_password_complete_subject" => "Đổi mật khẩu thành công", "email_password_complete_body" => "Xin chào <%name%>,

Mật khẩu cho tài khoản \"<%username%>\" đã được đổi thành công.

Cám ơn.", );