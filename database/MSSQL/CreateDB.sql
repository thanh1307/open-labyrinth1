USE [openlabyrinth]
GO
/****** Object:  Table [dbo].[user_sessions]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[user_sessions]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[user_sessions](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[map_id] [bigint] NOT NULL,
	[start_time] [int] NOT NULL,
	[user_ip] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_user_sessions] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_vpd_types]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_vpd_types]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_vpd_types](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NOT NULL,
	[label] [nvarchar](500) NOT NULL,
 CONSTRAINT [PK_map_vpd_types] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_vpd_types] ON
INSERT [dbo].[map_vpd_types] ([id], [name], [label]) VALUES (1, N'VPDText', N'Text')
INSERT [dbo].[map_vpd_types] ([id], [name], [label]) VALUES (2, N'PatientDiagnoses', N'Patient Demographics')
INSERT [dbo].[map_vpd_types] ([id], [name], [label]) VALUES (3, N'AuthorDiagnoses', N'Author Diagnosis')
INSERT [dbo].[map_vpd_types] ([id], [name], [label]) VALUES (4, N'Medication', N'Medication')
INSERT [dbo].[map_vpd_types] ([id], [name], [label]) VALUES (5, N'InterviewItem', N'Question')
SET IDENTITY_INSERT [dbo].[map_vpd_types] OFF
/****** Object:  Table [dbo].[remoteServices]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[remoteServices]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[remoteServices](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NOT NULL,
	[type] [nvarchar](1) NOT NULL,
	[ip] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_remoteServices] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[user_types]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[user_types]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[user_types](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](30) NOT NULL,
	[description] [nvarchar](100) NULL,
 CONSTRAINT [PK_user_types] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[user_types] ON
INSERT [dbo].[user_types] ([id], [name], [description]) VALUES (1, N'learner', NULL)
INSERT [dbo].[user_types] ([id], [name], [description]) VALUES (2, N'author', NULL)
INSERT [dbo].[user_types] ([id], [name], [description]) VALUES (3, N'reviewer', NULL)
INSERT [dbo].[user_types] ([id], [name], [description]) VALUES (4, N'superuser', NULL)
INSERT [dbo].[user_types] ([id], [name], [description]) VALUES (5, N'remote service', NULL)
SET IDENTITY_INSERT [dbo].[user_types] OFF
/****** Object:  Table [dbo].[map_types]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_types]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_types](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NOT NULL,
	[description] [nvarchar](700) NOT NULL,
 CONSTRAINT [PK_map_types] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_types] ON
INSERT [dbo].[map_types] ([id], [name], [description]) VALUES (1, N'Ngoại trang hệ thống', N'')
INSERT [dbo].[map_types] ([id], [name], [description]) VALUES (2, N'Trò chơi - điểm số, 1 điểm bắt đầu, ít nhất 1 điểm', N'')
INSERT [dbo].[map_types] ([id], [name], [description]) VALUES (3, N'Hệ thống - không có điểm, 1 điểm bắt đầu trở lên, không yêu cầu điểm ít nhất', N'')
INSERT [dbo].[map_types] ([id], [name], [description]) VALUES (4, N'Thuật toán - không có điểm, 1 điểm bắt đầu, ít nhất 1 điểm', N'')
INSERT [dbo].[map_types] ([id], [name], [description]) VALUES (5, N'Vấn đề về tính năng chính', N'')
SET IDENTITY_INSERT [dbo].[map_types] OFF
/****** Object:  Table [dbo].[user_bookmarks]   Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[user_bookmarks]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[user_bookmarks](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[session_id] [bigint] NOT NULL,
	[time_stamp] [bigint] NOT NULL,
	[node_id] [bigint] NOT NULL,
 CONSTRAINT [PK_user_bookmarks] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_skins]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_skins]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_skins](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NOT NULL,
	[path] [nvarchar](200) NOT NULL,
 CONSTRAINT [PK_map_skins] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_skins] ON
INSERT [dbo].[map_skins] ([id], [name], [path]) VALUES (1, N'Cơ bản', N'basic/basic')
INSERT [dbo].[map_skins] ([id], [name], [path]) VALUES (2, N'Kiểm tra cơ bản', N'')
INSERT [dbo].[map_skins] ([id], [name], [path]) VALUES (3, N'NOSM', N'')
INSERT [dbo].[map_skins] ([id], [name], [path]) VALUES (4, N'PINE', N'')
SET IDENTITY_INSERT [dbo].[map_skins] OFF
/****** Object:  Table [dbo].[map_securities]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_securities]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_securities](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NOT NULL,
	[description] [nvarchar](700) NOT NULL,
 CONSTRAINT [PK_map_securities] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_securities] ON
INSERT [dbo].[map_securities] ([id], [name], [description]) VALUES (1, N'Mở quyền truy cập', N'')
INSERT [dbo].[map_securities] ([id], [name], [description]) VALUES (2, N'Đóng (Chỉ có người đăng nhập hệ thống mới thấy được)', N'')
INSERT [dbo].[map_securities] ([id], [name], [description]) VALUES (3, N'Bảo mật (chỉ tác giả và người dùng đã đăng ký mới có thể nhìn thấy nó)', N'')
INSERT [dbo].[map_securities] ([id], [name], [description]) VALUES (4, N'Chìa khóa (cần có chìa khóa để truy cập Hệ thống này) - <a href=''editKeys''>edit</a>', N'')
SET IDENTITY_INSERT [dbo].[map_securities] OFF
/****** Object:  Table [dbo].[map_sections]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_sections]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_sections](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NOT NULL,
	[description] [nvarchar](700) NOT NULL,
 CONSTRAINT [PK_map_sections] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_sections] ON
INSERT [dbo].[map_sections] ([id], [name], [description]) VALUES (1, N'Không hiển thị', N'')
INSERT [dbo].[map_sections] ([id], [name], [description]) VALUES (2, N'Hiển thị', N'')
INSERT [dbo].[map_sections] ([id], [name], [description]) VALUES (3, N'Có thể điều hướng', N'')
SET IDENTITY_INSERT [dbo].[map_sections] OFF
/****** Object:  Table [dbo].[map_question_types]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_question_types]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_question_types](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](70) NULL,
	[value] [nvarchar](20) NULL,
	[template_name] [nvarchar](200) NOT NULL,
	[template_args] [nvarchar](100) NULL,
 CONSTRAINT [PK_map_question_types] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_question_types] ON
INSERT [dbo].[map_question_types] ([id], [title], [value], [template_name], [template_args]) VALUES (1, N'single line text entry - not assessd', N'text', N'text', NULL)
INSERT [dbo].[map_question_types] ([id], [title], [value], [template_name], [template_args]) VALUES (2, N'multi-line text entry - not assessed', N'area', N'area', NULL)
INSERT [dbo].[map_question_types] ([id], [title], [value], [template_name], [template_args]) VALUES (3, N'multiple choice - two options', N'mcq2', N'response', N'2')
INSERT [dbo].[map_question_types] ([id], [title], [value], [template_name], [template_args]) VALUES (4, N'multiple choice - three options', N'mcq3', N'response', N'3')
INSERT [dbo].[map_question_types] ([id], [title], [value], [template_name], [template_args]) VALUES (5, N'multiple choice - five options', N'mcq5', N'response', N'5')
SET IDENTITY_INSERT [dbo].[map_question_types] OFF
/****** Object:  Table [dbo].[map_presentations]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_presentations]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_presentations](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](1000) NULL,
	[header] [nvarchar](3000) NULL,
	[footer] [nvarchar](3000) NULL,
	[skin_id] [bigint] NULL,
	[access] [int] NULL,
	[login] [int] NULL,
	[order] [int] NULL,
	[user_id] [int] NULL,
	[start_date] [float] NULL,
	[end_date] [float] NULL,
	[tries] [int] NULL,
 CONSTRAINT [PK_map_presentations] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_feedback_operators]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_feedback_operators]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_feedback_operators](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](100) NOT NULL,
	[value] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_map_feedback_operators] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_feedback_operators] ON
INSERT [dbo].[map_feedback_operators] ([id], [title], [value]) VALUES (1, N'equal to', N'eq')
INSERT [dbo].[map_feedback_operators] ([id], [title], [value]) VALUES (2, N'not equal to', N'neq')
INSERT [dbo].[map_feedback_operators] ([id], [title], [value]) VALUES (3, N'less than equal to', N'leq')
INSERT [dbo].[map_feedback_operators] ([id], [title], [value]) VALUES (4, N'less than', N'lt')
INSERT [dbo].[map_feedback_operators] ([id], [title], [value]) VALUES (5, N'greater than or equal to', N'geq')
SET IDENTITY_INSERT [dbo].[map_feedback_operators] OFF
/****** Object:  Table [dbo].[map_counter_rule_relations]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_counter_rule_relations]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_counter_rule_relations](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](70) NOT NULL,
	[value] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_map_counter_rule_relations] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_counter_rule_relations] ON
INSERT [dbo].[map_counter_rule_relations] ([id], [title], [value]) VALUES (1, N'equal to', N'eq')
INSERT [dbo].[map_counter_rule_relations] ([id], [title], [value]) VALUES (2, N'not equal to', N'neq')
INSERT [dbo].[map_counter_rule_relations] ([id], [title], [value]) VALUES (3, N'less than or equal to', N'leq')
INSERT [dbo].[map_counter_rule_relations] ([id], [title], [value]) VALUES (4, N'less than', N'lt')
INSERT [dbo].[map_counter_rule_relations] ([id], [title], [value]) VALUES (5, N'greater that oe qual to', N'geq')
SET IDENTITY_INSERT [dbo].[map_counter_rule_relations] OFF
/****** Object:  Table [dbo].[languages]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[languages]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[languages](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](20) NOT NULL,
	[key] [nvarchar](20) NOT NULL,
 CONSTRAINT [PK_languages] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[languages] ON
INSERT [dbo].[languages] ([id], [name], [key]) VALUES (1, N'EN', N'en-en')
INSERT [dbo].[languages] ([id], [name], [key]) VALUES (2, N'FR', N'fr-fr')
SET IDENTITY_INSERT [dbo].[languages] OFF
/****** Object:  Table [dbo].[groups]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[groups]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[groups](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NOT NULL,
 CONSTRAINT [PK_groups] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_contributor_roles]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_contributor_roles]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_contributor_roles](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NOT NULL,
	[description] [nvarchar](700) NOT NULL,
 CONSTRAINT [PK_map_contributor_roles] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_contributor_roles] ON
INSERT [dbo].[map_contributor_roles] ([id], [name], [description]) VALUES (1, N'author', N'')
INSERT [dbo].[map_contributor_roles] ([id], [name], [description]) VALUES (2, N'publisher', N'')
INSERT [dbo].[map_contributor_roles] ([id], [name], [description]) VALUES (3, N'initiator', N'')
INSERT [dbo].[map_contributor_roles] ([id], [name], [description]) VALUES (4, N'validator', N'')
INSERT [dbo].[map_contributor_roles] ([id], [name], [description]) VALUES (5, N'editor', N'')
SET IDENTITY_INSERT [dbo].[map_contributor_roles] OFF
/****** Object:  Table [dbo].[map_collections]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_collections]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_collections](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](200) NULL,
 CONSTRAINT [PK_map_collections] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_feedback_types]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_feedback_types]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_feedback_types](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NULL,
	[description] [ntext] NULL,
 CONSTRAINT [PK_map_feedback_types] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_feedback_types] ON
INSERT [dbo].[map_feedback_types] ([id], [name], [description]) VALUES (1, N'time taken', NULL)
INSERT [dbo].[map_feedback_types] ([id], [name], [description]) VALUES (2, N'counter value', NULL)
INSERT [dbo].[map_feedback_types] ([id], [name], [description]) VALUES (3, N'node visit', NULL)
INSERT [dbo].[map_feedback_types] ([id], [name], [description]) VALUES (4, N'must visit', NULL)
INSERT [dbo].[map_feedback_types] ([id], [name], [description]) VALUES (5, N'must avoid', NULL)
SET IDENTITY_INSERT [dbo].[map_feedback_types] OFF
/****** Object:  Table [dbo].[map_node_priorities]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_node_priorities]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_node_priorities](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](70) NOT NULL,
	[description] [nvarchar](500) NOT NULL,
 CONSTRAINT [PK_map_node_priorities] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_node_priorities] ON
INSERT [dbo].[map_node_priorities] ([id], [name], [description]) VALUES (1, N'normal (default)', N'')
INSERT [dbo].[map_node_priorities] ([id], [name], [description]) VALUES (2, N'must avoid', N'')
INSERT [dbo].[map_node_priorities] ([id], [name], [description]) VALUES (3, N'must visit', N'')
SET IDENTITY_INSERT [dbo].[map_node_priorities] OFF
/****** Object:  Table [dbo].[map_node_link_types]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_node_link_types]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_node_link_types](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](50) NOT NULL,
	[description] [nvarchar](500) NOT NULL,
 CONSTRAINT [PK_map_node_link_types] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_node_link_types] ON
INSERT [dbo].[map_node_link_types] ([id], [name], [description]) VALUES (1, N'ordered', N'')
INSERT [dbo].[map_node_link_types] ([id], [name], [description]) VALUES (2, N'random order', N'')
INSERT [dbo].[map_node_link_types] ([id], [name], [description]) VALUES (3, N'random select one *', N'')
SET IDENTITY_INSERT [dbo].[map_node_link_types] OFF
/****** Object:  Table [dbo].[map_node_link_stylies]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_node_link_stylies]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_node_link_stylies](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](70) NOT NULL,
	[description] [nvarchar](500) NOT NULL,
 CONSTRAINT [PK_map_node_link_stylies] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_node_link_stylies] ON
INSERT [dbo].[map_node_link_stylies] ([id], [name], [description]) VALUES (1, N'text (default)', N'')
INSERT [dbo].[map_node_link_stylies] ([id], [name], [description]) VALUES (2, N'dropdown', N'')
INSERT [dbo].[map_node_link_stylies] ([id], [name], [description]) VALUES (3, N'dropdown + confidence', N'')
INSERT [dbo].[map_node_link_stylies] ([id], [name], [description]) VALUES (4, N'type in text', N'')
SET IDENTITY_INSERT [dbo].[map_node_link_stylies] OFF
/****** Object:  Table [dbo].[map_node_types]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_node_types]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_node_types](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](70) NOT NULL,
	[description] [nvarchar](500) NOT NULL,
 CONSTRAINT [PK_map_node_types] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[map_node_types] ON
INSERT [dbo].[map_node_types] ([id], [name], [description]) VALUES (1, N'root', N'')
INSERT [dbo].[map_node_types] ([id], [name], [description]) VALUES (2, N'child', N'')
SET IDENTITY_INSERT [dbo].[map_node_types] OFF
/****** Object:  Table [dbo].[map_node_sections]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_node_sections]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_node_sections](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](50) NOT NULL,
	[map_id] [bigint] NOT NULL,
 CONSTRAINT [PK_map_node_sections] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_nodes]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_nodes]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_nodes](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[title] [nvarchar](200) NULL,
	[text] [nvarchar](4000) NULL,
	[content] [nvarchar](4000) NULL,
	[type_id] [bigint] NULL,
	[probability] [smallint] NULL,
	[conditional] [nvarchar](500) NULL,
	[conditional_message] [nvarchar](1000) NULL,
	[info] [nvarchar](1000) NULL,
	[link_style_id] [int] NULL,
	[link_type_id] [int] NULL,
	[priority_id] [int] NULL,
	[kfp] [smallint] NULL,
	[undo] [smallint] NULL,
	[end] [smallint] NULL,
	[x] [float] NULL,
	[y] [float] NULL,
	[rgb] [nvarchar](8) NULL,
 CONSTRAINT [PK_map_nodes] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[users]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[users]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[username] [nvarchar](40) NOT NULL,
	[password] [nvarchar](800) NOT NULL,
	[email] [nvarchar](250) NOT NULL,
	[nickname] [nvarchar](120) NOT NULL,
	[language_id] [bigint] NOT NULL,
	[type_id] [bigint] NOT NULL,
 CONSTRAINT [PK_users] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET IDENTITY_INSERT [dbo].[users] ON
INSERT [dbo].[users] ([id], [username], [password], [email], [nickname], [language_id], [type_id]) VALUES (1, N'admin', N'bf7bdf17dad6154e88bf66b9768174a47658e84baa1036c3f6f0cbeae5be1db7', N'admin@admin.com', N'administrator', 1, 4)
SET IDENTITY_INSERT [dbo].[users] OFF
/****** Object:  Table [dbo].[user_groups]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[user_groups]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[user_groups](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[group_id] [bigint] NOT NULL,
 CONSTRAINT [PK_user_groups] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_presentation_users]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_presentation_users]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_presentation_users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[presentation_id] [bigint] NOT NULL,
	[user_id] [bigint] NOT NULL,
 CONSTRAINT [PK_map_presentation_users] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[maps]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[maps]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[maps](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](200) NOT NULL,
	[author_id] [bigint] NOT NULL,
	[abstract] [nvarchar](2000) NOT NULL,
	[startScore] [int] NOT NULL,
	[threshold] [int] NOT NULL,
	[keywords] [nvarchar](500) NOT NULL,
	[type_id] [bigint] NOT NULL,
	[units] [nvarchar](10) NOT NULL,
	[security_id] [bigint] NOT NULL,
	[guid] [nvarchar](50) NOT NULL,
	[timing] [smallint] NOT NULL,
	[delta_time] [int] NOT NULL,
	[show_bar] [smallint] NOT NULL,
	[show_score] [smallint] NOT NULL,
	[skin_id] [bigint] NOT NULL,
	[enabled] [smallint] NOT NULL,
	[section_id] [bigint] NOT NULL,
	[language_id] [bigint] NULL,
	[feedback] [nvarchar](2000) NOT NULL,
	[dev_notes] [nvarchar](1000) NOT NULL,
	[source] [nvarchar](50) NOT NULL,
	[source_id] [int] NOT NULL,
 CONSTRAINT [PK_maps] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_node_section_nodes]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_node_section_nodes]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_node_section_nodes](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[section_id] [bigint] NOT NULL,
	[node_id] [bigint] NOT NULL,
	[order] [int] NOT NULL,
 CONSTRAINT [PK_map_node_section_nodes] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_node_counters]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_node_counters]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_node_counters](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[node_id] [bigint] NOT NULL,
	[counter_id] [int] NOT NULL,
	[function] [nvarchar](20) NOT NULL,
 CONSTRAINT [PK_map_node_counters] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_node_links]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_node_links]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_node_links](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[node_id_1] [bigint] NOT NULL,
	[node_id_2] [bigint] NOT NULL,
	[image_id] [int] NULL,
	[text] [nvarchar](500) NULL,
	[order] [int] NULL,
	[probability] [int] NULL,
 CONSTRAINT [PK_map_node_links] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_feedback_rules]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_feedback_rules]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_feedback_rules](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[rule_type_id] [int] NOT NULL,
	[value] [int] NULL,
	[operator_id] [int] NULL,
	[message] [nvarchar](4000) NULL,
	[counter_id] [int] NULL,
 CONSTRAINT [PK_map_feedback_rules] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_keys]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_keys]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_keys](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[key] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_map_keys] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_collectionMaps]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_collectionMaps]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_collectionMaps](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[collection_id] [bigint] NOT NULL,
	[map_id] [bigint] NOT NULL,
 CONSTRAINT [PK_map_collectionMaps] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_chats]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_chats]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_chats](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[counter_id] [bigint] NULL,
	[stem] [nvarchar](4000) NOT NULL,
 CONSTRAINT [PK_map_chats] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_contributors]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_contributors]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_contributors](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[role_id] [int] NOT NULL,
	[name] [nvarchar](200) NOT NULL,
	[organization] [nvarchar](200) NOT NULL,
 CONSTRAINT [PK_map_contributors] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_counters]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_counters]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_counters](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NULL,
	[name] [nvarchar](200) NULL,
	[description] [nvarchar](4000) NULL,
	[start_value] [int] NOT NULL,
	[icon_id] [int] NULL,
	[prefix] [nvarchar](20) NULL,
	[suffix] [nvarchar](20) NULL,
	[visible] [smallint] NULL,
	[out_of] [int] NULL,
 CONSTRAINT [PK_map_counters] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_elements]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_elements]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_elements](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[mime] [nvarchar](500) NULL,
	[name] [nvarchar](200) NOT NULL,
	[path] [nvarchar](300) NOT NULL,
	[args] [nvarchar](100) NULL,
	[width] [int] NULL,
	[width_type] [nvarchar](2) NOT NULL,
	[height] [int] NULL,
	[height_type] [nvarchar](2) NOT NULL,
	[h_align] [nvarchar](20) NULL,
	[v_align] [nvarchar](20) NULL,
 CONSTRAINT [PK_map_elements] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_dams]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_dams]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_dams](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[name] [nvarchar](500) NULL,
 CONSTRAINT [PK_map_dams] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_vpds]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_vpds]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_vpds](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[vpd_type_id] [bigint] NOT NULL,
 CONSTRAINT [PK_map_vpds] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_questions]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_questions]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_questions](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[stem] [nvarchar](500) NULL,
	[entry_type_id] [int] NOT NULL,
	[width] [int] NOT NULL,
	[height] [int] NOT NULL,
	[feedback] [nvarchar](1000) NULL,
	[show_answer] [smallint] NOT NULL,
	[counter_id] [int] NULL,
	[num_tries] [int] NOT NULL,
 CONSTRAINT [PK_map_questions] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_presentation_maps]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_presentation_maps]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_presentation_maps](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[presentation_id] [bigint] NOT NULL,
	[map_id] [bigint] NOT NULL,
	[order] [int] NULL,
 CONSTRAINT [PK_map_presentation_maps] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_users]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_users]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[user_id] [bigint] NOT NULL,
 CONSTRAINT [PK_map_users] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_avatars]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_avatars]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_avatars](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[map_id] [bigint] NOT NULL,
	[skin_1] [nvarchar](6) NULL,
	[skin_2] [nvarchar](6) NULL,
	[cloth] [nvarchar](6) NULL,
	[nose] [nvarchar](20) NULL,
	[hair] [nvarchar](20) NULL,
	[environment] [nvarchar](20) NULL,
	[accessory_1] [nvarchar](20) NULL,
	[bkd] [nvarchar](6) NULL,
	[sex] [nvarchar](20) NULL,
	[mouth] [nvarchar](20) NULL,
	[outfit] [nvarchar](20) NULL,
	[bubble] [nvarchar](20) NULL,
	[bubble_text] [nvarchar](100) NULL,
	[accessory_2] [nvarchar](20) NULL,
	[accessory_3] [nvarchar](20) NULL,
	[age] [nvarchar](2) NULL,
	[eyes] [nvarchar](20) NULL,
	[hair_color] [nvarchar](6) NULL,
	[image] [nvarchar](100) NULL,
 CONSTRAINT [PK_map_avatars] PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[user_sessiontraces]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[user_sessiontraces]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[user_sessiontraces](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[session_id] [bigint] NOT NULL,
	[user_id] [bigint] NOT NULL,
	[map_id] [bigint] NOT NULL,
	[node_id] [bigint] NOT NULL,
	[counters] [nvarchar](700) NULL,
	[date_stamp] [float] NULL,
	[confidence] [smallint] NULL,
	[dams] [nvarchar](700) NULL,
	[bookmark_made] [int] NULL,
	[bookmark_used] [int] NULL,
 CONSTRAINT [PK_user_sessiontraces] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[remoteMaps]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[remoteMaps]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[remoteMaps](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[service_id] [bigint] NOT NULL,
	[map_id] [bigint] NOT NULL,
 CONSTRAINT [PK_remoteMaps] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[user_responses]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[user_responses]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[user_responses](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[question_id] [bigint] NOT NULL,
	[session_id] [bigint] NOT NULL,
	[response] [nvarchar](1000) NULL,
 CONSTRAINT [PK_user_responses] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_vpd_elements]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_vpd_elements]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_vpd_elements](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[vpd_id] [bigint] NOT NULL,
	[key] [nvarchar](100) NOT NULL,
	[value] [nvarchar](500) NOT NULL,
 CONSTRAINT [PK_map_vpd_elements] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_question_responses]    Script Date: 04/03/2012 18:40:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_question_responses]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_question_responses](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[question_id] [bigint] NOT NULL,
	[response] [nvarchar](250) NULL,
	[feedback] [nvarchar](4000) NULL,
	[is_correct] [smallint] NULL,
	[score] [int] NULL,
 CONSTRAINT [PK_map_question_responses] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_dam_elements]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_dam_elements]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_dam_elements](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[dam_id] [bigint] NOT NULL,
	[element_type] [nvarchar](20) NULL,
	[order] [int] NULL,
	[display] [nvarchar](20) NOT NULL,
	[element_id] [bigint] NOT NULL,
 CONSTRAINT [PK_map_dam_elements] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_counter_rules]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_counter_rules]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_counter_rules](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[counter_id] [bigint] NOT NULL,
	[relation_id] [int] NOT NULL,
	[value] [int] NOT NULL,
	[function] [nvarchar](50) NULL,
	[redirect_node_id] [int] NULL,
	[message] [nvarchar](500) NULL,
	[counter] [int] NULL,
	[counter_value] [nvarchar](50) NULL,
 CONSTRAINT [PK_map_counter_rules] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Table [dbo].[map_chat_elements]    Script Date: 04/03/2012 18:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[map_chat_elements]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[map_chat_elements](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[chat_id] [bigint] NOT NULL,
	[question] [nvarchar](4000) NOT NULL,
	[response] [nvarchar](4000) NOT NULL,
	[function] [nvarchar](10) NOT NULL,
 CONSTRAINT [PK_map_chat_elements] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
/****** Object:  Default [DF__map_count__start__1367E606]    Script Date: 04/03/2012 18:40:53 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_count__start__1367E606]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_counters]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_count__start__1367E606]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_counters] ADD  CONSTRAINT [DF__map_count__start__1367E606]  DEFAULT ((0)) FOR [start_value]
END


End
GO
/****** Object:  Default [DF__map_count__visib__145C0A3F]    Script Date: 04/03/2012 18:40:53 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_count__visib__145C0A3F]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_counters]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_count__visib__145C0A3F]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_counters] ADD  CONSTRAINT [DF__map_count__visib__145C0A3F]  DEFAULT ((0)) FOR [visible]
END


End
GO
/****** Object:  Default [DF__map_dam_e__order__173876EA]    Script Date: 04/03/2012 18:40:53 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_dam_e__order__173876EA]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_dam_elements]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_dam_e__order__173876EA]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_dam_elements] ADD  DEFAULT ((0)) FOR [order]
END


End
GO
/****** Object:  Default [DF__map_eleme__width__1BFD2C07]    Script Date: 04/03/2012 18:40:53 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_eleme__width__1BFD2C07]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_elements]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_eleme__width__1BFD2C07]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_elements] ADD  DEFAULT ('px') FOR [width_type]
END


End
GO
/****** Object:  Default [DF__map_eleme__heigh__1CF15040]    Script Date: 04/03/2012 18:40:53 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_eleme__heigh__1CF15040]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_elements]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_eleme__heigh__1CF15040]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_elements] ADD  DEFAULT ('px') FOR [height_type]
END


End
GO
/****** Object:  Default [DF__map_node___order__2D27B809]    Script Date: 04/03/2012 18:40:53 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_node___order__2D27B809]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_node___order__2D27B809]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_node_links] ADD  DEFAULT ((1)) FOR [order]
END


End
GO
/****** Object:  Default [DF__map_node___proba__2E1BDC42]    Script Date: 04/03/2012 18:40:53 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_node___proba__2E1BDC42]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_node___proba__2E1BDC42]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_node_links] ADD  DEFAULT ((0)) FOR [probability]
END


End
GO
/****** Object:  Default [DF__map_nodes__link___38996AB5]    Script Date: 04/03/2012 18:40:53 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_nodes__link___38996AB5]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_nodes]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_nodes__link___38996AB5]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_nodes] ADD  CONSTRAINT [DF__map_nodes__link___38996AB5]  DEFAULT ((1)) FOR [link_type_id]
END


End
GO
/****** Object:  Default [DF__map_quest__width__44FF419A]    Script Date: 04/03/2012 18:40:54 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_quest__width__44FF419A]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_questions]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_quest__width__44FF419A]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_questions] ADD  DEFAULT ((0)) FOR [width]
END


End
GO
/****** Object:  Default [DF__map_quest__heigh__45F365D3]    Script Date: 04/03/2012 18:40:54 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_quest__heigh__45F365D3]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_questions]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_quest__heigh__45F365D3]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_questions] ADD  DEFAULT ((0)) FOR [height]
END


End
GO
/****** Object:  Default [DF__map_quest__show___46E78A0C]    Script Date: 04/03/2012 18:40:54 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_quest__show___46E78A0C]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_questions]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_quest__show___46E78A0C]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_questions] ADD  DEFAULT ((1)) FOR [show_answer]
END


End
GO
/****** Object:  Default [DF__map_quest__num_t__47DBAE45]    Script Date: 04/03/2012 18:40:54 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__map_quest__num_t__47DBAE45]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_questions]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__map_quest__num_t__47DBAE45]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[map_questions] ADD  DEFAULT ((-1)) FOR [num_tries]
END


End
GO
/****** Object:  Default [DF__maps__keywords__59FA5E80]    Script Date: 04/03/2012 18:40:54 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__maps__keywords__59FA5E80]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__maps__keywords__59FA5E80]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[maps] ADD  DEFAULT ('''''') FOR [keywords]
END


End
GO
/****** Object:  Default [DF__maps__language_i__5AEE82B9]    Script Date: 04/03/2012 18:40:54 ******/
IF Not EXISTS (SELECT * FROM sys.default_constraints WHERE object_id = OBJECT_ID(N'[dbo].[DF__maps__language_i__5AEE82B9]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
Begin
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[DF__maps__language_i__5AEE82B9]') AND type = 'D')
BEGIN
ALTER TABLE [dbo].[maps] ADD  DEFAULT ((1)) FOR [language_id]
END


End
GO
/****** Object:  ForeignKey [FK_map_avatars_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_avatars_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_avatars]'))
ALTER TABLE [dbo].[map_avatars]  WITH CHECK ADD  CONSTRAINT [FK_map_avatars_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_avatars_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_avatars]'))
ALTER TABLE [dbo].[map_avatars] CHECK CONSTRAINT [FK_map_avatars_maps]
GO
/****** Object:  ForeignKey [FK_map_chat_elements_map_chats]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_chat_elements_map_chats]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_chat_elements]'))
ALTER TABLE [dbo].[map_chat_elements]  WITH CHECK ADD  CONSTRAINT [FK_map_chat_elements_map_chats] FOREIGN KEY([chat_id])
REFERENCES [dbo].[map_chats] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_chat_elements_map_chats]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_chat_elements]'))
ALTER TABLE [dbo].[map_chat_elements] CHECK CONSTRAINT [FK_map_chat_elements_map_chats]
GO
/****** Object:  ForeignKey [FK_map_chats_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_chats_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_chats]'))
ALTER TABLE [dbo].[map_chats]  WITH CHECK ADD  CONSTRAINT [FK_map_chats_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_chats_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_chats]'))
ALTER TABLE [dbo].[map_chats] CHECK CONSTRAINT [FK_map_chats_maps]
GO
/****** Object:  ForeignKey [FK_map_collectionMaps_map_collections]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_collectionMaps_map_collections]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_collectionMaps]'))
ALTER TABLE [dbo].[map_collectionMaps]  WITH CHECK ADD  CONSTRAINT [FK_map_collectionMaps_map_collections] FOREIGN KEY([collection_id])
REFERENCES [dbo].[map_collections] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_collectionMaps_map_collections]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_collectionMaps]'))
ALTER TABLE [dbo].[map_collectionMaps] CHECK CONSTRAINT [FK_map_collectionMaps_map_collections]
GO
/****** Object:  ForeignKey [FK_map_collectionMaps_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_collectionMaps_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_collectionMaps]'))
ALTER TABLE [dbo].[map_collectionMaps]  WITH CHECK ADD  CONSTRAINT [FK_map_collectionMaps_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_collectionMaps_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_collectionMaps]'))
ALTER TABLE [dbo].[map_collectionMaps] CHECK CONSTRAINT [FK_map_collectionMaps_maps]
GO
/****** Object:  ForeignKey [FK_map_contributors_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_contributors_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_contributors]'))
ALTER TABLE [dbo].[map_contributors]  WITH CHECK ADD  CONSTRAINT [FK_map_contributors_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_contributors_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_contributors]'))
ALTER TABLE [dbo].[map_contributors] CHECK CONSTRAINT [FK_map_contributors_maps]
GO
/****** Object:  ForeignKey [FK_map_counter_rules_map_counters]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_counter_rules_map_counters]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_counter_rules]'))
ALTER TABLE [dbo].[map_counter_rules]  WITH CHECK ADD  CONSTRAINT [FK_map_counter_rules_map_counters] FOREIGN KEY([counter_id])
REFERENCES [dbo].[map_counters] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_counter_rules_map_counters]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_counter_rules]'))
ALTER TABLE [dbo].[map_counter_rules] CHECK CONSTRAINT [FK_map_counter_rules_map_counters]
GO
/****** Object:  ForeignKey [FK_map_counters_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_counters_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_counters]'))
ALTER TABLE [dbo].[map_counters]  WITH CHECK ADD  CONSTRAINT [FK_map_counters_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_counters_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_counters]'))
ALTER TABLE [dbo].[map_counters] CHECK CONSTRAINT [FK_map_counters_maps]
GO
/****** Object:  ForeignKey [FK_map_dam_elements_map_dams]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_dam_elements_map_dams]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_dam_elements]'))
ALTER TABLE [dbo].[map_dam_elements]  WITH CHECK ADD  CONSTRAINT [FK_map_dam_elements_map_dams] FOREIGN KEY([dam_id])
REFERENCES [dbo].[map_dams] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_dam_elements_map_dams]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_dam_elements]'))
ALTER TABLE [dbo].[map_dam_elements] CHECK CONSTRAINT [FK_map_dam_elements_map_dams]
GO
/****** Object:  ForeignKey [FK_map_dams_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_dams_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_dams]'))
ALTER TABLE [dbo].[map_dams]  WITH CHECK ADD  CONSTRAINT [FK_map_dams_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_dams_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_dams]'))
ALTER TABLE [dbo].[map_dams] CHECK CONSTRAINT [FK_map_dams_maps]
GO
/****** Object:  ForeignKey [FK_map_elements_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_elements_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_elements]'))
ALTER TABLE [dbo].[map_elements]  WITH CHECK ADD  CONSTRAINT [FK_map_elements_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_elements_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_elements]'))
ALTER TABLE [dbo].[map_elements] CHECK CONSTRAINT [FK_map_elements_maps]
GO
/****** Object:  ForeignKey [FK_map_feedback_rules_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_feedback_rules_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_feedback_rules]'))
ALTER TABLE [dbo].[map_feedback_rules]  WITH CHECK ADD  CONSTRAINT [FK_map_feedback_rules_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_feedback_rules_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_feedback_rules]'))
ALTER TABLE [dbo].[map_feedback_rules] CHECK CONSTRAINT [FK_map_feedback_rules_maps]
GO
/****** Object:  ForeignKey [FK_map_keys_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_keys_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_keys]'))
ALTER TABLE [dbo].[map_keys]  WITH CHECK ADD  CONSTRAINT [FK_map_keys_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_keys_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_keys]'))
ALTER TABLE [dbo].[map_keys] CHECK CONSTRAINT [FK_map_keys_maps]
GO
/****** Object:  ForeignKey [FK_map_node_counters_map_node_counters]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_counters_map_node_counters]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_counters]'))
ALTER TABLE [dbo].[map_node_counters]  WITH CHECK ADD  CONSTRAINT [FK_map_node_counters_map_node_counters] FOREIGN KEY([id])
REFERENCES [dbo].[map_node_counters] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_counters_map_node_counters]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_counters]'))
ALTER TABLE [dbo].[map_node_counters] CHECK CONSTRAINT [FK_map_node_counters_map_node_counters]
GO
/****** Object:  ForeignKey [FK_map_node_counters_map_nodes]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_counters_map_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_counters]'))
ALTER TABLE [dbo].[map_node_counters]  WITH CHECK ADD  CONSTRAINT [FK_map_node_counters_map_nodes] FOREIGN KEY([node_id])
REFERENCES [dbo].[map_nodes] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_counters_map_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_counters]'))
ALTER TABLE [dbo].[map_node_counters] CHECK CONSTRAINT [FK_map_node_counters_map_nodes]
GO
/****** Object:  ForeignKey [FK_map_node_links_map_node_links]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_links_map_node_links]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
ALTER TABLE [dbo].[map_node_links]  WITH CHECK ADD  CONSTRAINT [FK_map_node_links_map_node_links] FOREIGN KEY([id])
REFERENCES [dbo].[map_node_links] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_links_map_node_links]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
ALTER TABLE [dbo].[map_node_links] CHECK CONSTRAINT [FK_map_node_links_map_node_links]
GO
/****** Object:  ForeignKey [FK_map_node_links_map_nodes]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_links_map_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
ALTER TABLE [dbo].[map_node_links]  WITH CHECK ADD  CONSTRAINT [FK_map_node_links_map_nodes] FOREIGN KEY([node_id_1])
REFERENCES [dbo].[map_nodes] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_links_map_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
ALTER TABLE [dbo].[map_node_links] CHECK CONSTRAINT [FK_map_node_links_map_nodes]
GO
/****** Object:  ForeignKey [FK_map_node_links_map_nodes1]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_links_map_nodes1]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
ALTER TABLE [dbo].[map_node_links]  WITH CHECK ADD  CONSTRAINT [FK_map_node_links_map_nodes1] FOREIGN KEY([node_id_2])
REFERENCES [dbo].[map_nodes] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_links_map_nodes1]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
ALTER TABLE [dbo].[map_node_links] CHECK CONSTRAINT [FK_map_node_links_map_nodes1]
GO
/****** Object:  ForeignKey [FK_map_node_links_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_links_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
ALTER TABLE [dbo].[map_node_links]  WITH CHECK ADD  CONSTRAINT [FK_map_node_links_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_links_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_links]'))
ALTER TABLE [dbo].[map_node_links] CHECK CONSTRAINT [FK_map_node_links_maps]
GO
/****** Object:  ForeignKey [FK_map_node_section_nodes_map_node_section_nodes]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_section_nodes_map_node_section_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_section_nodes]'))
ALTER TABLE [dbo].[map_node_section_nodes]  WITH CHECK ADD  CONSTRAINT [FK_map_node_section_nodes_map_node_section_nodes] FOREIGN KEY([node_id])
REFERENCES [dbo].[map_nodes] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_section_nodes_map_node_section_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_section_nodes]'))
ALTER TABLE [dbo].[map_node_section_nodes] CHECK CONSTRAINT [FK_map_node_section_nodes_map_node_section_nodes]
GO
/****** Object:  ForeignKey [FK_map_node_section_nodes_map_node_sections]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_section_nodes_map_node_sections]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_section_nodes]'))
ALTER TABLE [dbo].[map_node_section_nodes]  WITH CHECK ADD  CONSTRAINT [FK_map_node_section_nodes_map_node_sections] FOREIGN KEY([section_id])
REFERENCES [dbo].[map_node_sections] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_node_section_nodes_map_node_sections]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_node_section_nodes]'))
ALTER TABLE [dbo].[map_node_section_nodes] CHECK CONSTRAINT [FK_map_node_section_nodes_map_node_sections]
GO
/****** Object:  ForeignKey [FK_map_nodes_map_nodes]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_nodes_map_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_nodes]'))
ALTER TABLE [dbo].[map_nodes]  WITH CHECK ADD  CONSTRAINT [FK_map_nodes_map_nodes] FOREIGN KEY([type_id])
REFERENCES [dbo].[map_node_types] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_nodes_map_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_nodes]'))
ALTER TABLE [dbo].[map_nodes] CHECK CONSTRAINT [FK_map_nodes_map_nodes]
GO
/****** Object:  ForeignKey [FK_map_presentation_maps_map_presentations]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_presentation_maps_map_presentations]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_presentation_maps]'))
ALTER TABLE [dbo].[map_presentation_maps]  WITH CHECK ADD  CONSTRAINT [FK_map_presentation_maps_map_presentations] FOREIGN KEY([presentation_id])
REFERENCES [dbo].[map_presentations] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_presentation_maps_map_presentations]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_presentation_maps]'))
ALTER TABLE [dbo].[map_presentation_maps] CHECK CONSTRAINT [FK_map_presentation_maps_map_presentations]
GO
/****** Object:  ForeignKey [FK_map_presentation_maps_maps]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_presentation_maps_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_presentation_maps]'))
ALTER TABLE [dbo].[map_presentation_maps]  WITH CHECK ADD  CONSTRAINT [FK_map_presentation_maps_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_presentation_maps_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_presentation_maps]'))
ALTER TABLE [dbo].[map_presentation_maps] CHECK CONSTRAINT [FK_map_presentation_maps_maps]
GO
/****** Object:  ForeignKey [FK_map_presentation_users_map_presentations]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_presentation_users_map_presentations]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_presentation_users]'))
ALTER TABLE [dbo].[map_presentation_users]  WITH CHECK ADD  CONSTRAINT [FK_map_presentation_users_map_presentations] FOREIGN KEY([presentation_id])
REFERENCES [dbo].[map_presentations] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_presentation_users_map_presentations]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_presentation_users]'))
ALTER TABLE [dbo].[map_presentation_users] CHECK CONSTRAINT [FK_map_presentation_users_map_presentations]
GO
/****** Object:  ForeignKey [FK_map_presentation_users_users]    Script Date: 04/03/2012 18:40:53 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_presentation_users_users]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_presentation_users]'))
ALTER TABLE [dbo].[map_presentation_users]  WITH CHECK ADD  CONSTRAINT [FK_map_presentation_users_users] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_presentation_users_users]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_presentation_users]'))
ALTER TABLE [dbo].[map_presentation_users] CHECK CONSTRAINT [FK_map_presentation_users_users]
GO
/****** Object:  ForeignKey [FK_map_question_responses_map_questions]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_question_responses_map_questions]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_question_responses]'))
ALTER TABLE [dbo].[map_question_responses]  WITH CHECK ADD  CONSTRAINT [FK_map_question_responses_map_questions] FOREIGN KEY([question_id])
REFERENCES [dbo].[map_questions] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_question_responses_map_questions]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_question_responses]'))
ALTER TABLE [dbo].[map_question_responses] CHECK CONSTRAINT [FK_map_question_responses_map_questions]
GO
/****** Object:  ForeignKey [FK_map_questions_maps]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_questions_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_questions]'))
ALTER TABLE [dbo].[map_questions]  WITH CHECK ADD  CONSTRAINT [FK_map_questions_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_questions_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_questions]'))
ALTER TABLE [dbo].[map_questions] CHECK CONSTRAINT [FK_map_questions_maps]
GO
/****** Object:  ForeignKey [FK_map_users_maps]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_users_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_users]'))
ALTER TABLE [dbo].[map_users]  WITH CHECK ADD  CONSTRAINT [FK_map_users_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_users_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_users]'))
ALTER TABLE [dbo].[map_users] CHECK CONSTRAINT [FK_map_users_maps]
GO
/****** Object:  ForeignKey [FK_map_users_users]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_users_users]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_users]'))
ALTER TABLE [dbo].[map_users]  WITH CHECK ADD  CONSTRAINT [FK_map_users_users] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_users_users]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_users]'))
ALTER TABLE [dbo].[map_users] CHECK CONSTRAINT [FK_map_users_users]
GO
/****** Object:  ForeignKey [FK_map_vpd_elements_map_vpds]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_vpd_elements_map_vpds]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_vpd_elements]'))
ALTER TABLE [dbo].[map_vpd_elements]  WITH CHECK ADD  CONSTRAINT [FK_map_vpd_elements_map_vpds] FOREIGN KEY([vpd_id])
REFERENCES [dbo].[map_vpds] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_vpd_elements_map_vpds]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_vpd_elements]'))
ALTER TABLE [dbo].[map_vpd_elements] CHECK CONSTRAINT [FK_map_vpd_elements_map_vpds]
GO
/****** Object:  ForeignKey [FK_map_vpds_map_vpd_types]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_vpds_map_vpd_types]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_vpds]'))
ALTER TABLE [dbo].[map_vpds]  WITH CHECK ADD  CONSTRAINT [FK_map_vpds_map_vpd_types] FOREIGN KEY([vpd_type_id])
REFERENCES [dbo].[map_vpd_types] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_vpds_map_vpd_types]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_vpds]'))
ALTER TABLE [dbo].[map_vpds] CHECK CONSTRAINT [FK_map_vpds_map_vpd_types]
GO
/****** Object:  ForeignKey [FK_map_vpds_maps]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_vpds_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_vpds]'))
ALTER TABLE [dbo].[map_vpds]  WITH CHECK ADD  CONSTRAINT [FK_map_vpds_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_map_vpds_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[map_vpds]'))
ALTER TABLE [dbo].[map_vpds] CHECK CONSTRAINT [FK_map_vpds_maps]
GO
/****** Object:  ForeignKey [FK_maps_languages]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_languages]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps]  WITH CHECK ADD  CONSTRAINT [FK_maps_languages] FOREIGN KEY([language_id])
REFERENCES [dbo].[languages] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_languages]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps] CHECK CONSTRAINT [FK_maps_languages]
GO
/****** Object:  ForeignKey [FK_maps_map_sections]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_map_sections]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps]  WITH CHECK ADD  CONSTRAINT [FK_maps_map_sections] FOREIGN KEY([section_id])
REFERENCES [dbo].[map_sections] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_map_sections]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps] CHECK CONSTRAINT [FK_maps_map_sections]
GO
/****** Object:  ForeignKey [FK_maps_map_securities]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_map_securities]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps]  WITH CHECK ADD  CONSTRAINT [FK_maps_map_securities] FOREIGN KEY([security_id])
REFERENCES [dbo].[map_securities] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_map_securities]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps] CHECK CONSTRAINT [FK_maps_map_securities]
GO
/****** Object:  ForeignKey [FK_maps_map_types]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_map_types]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps]  WITH CHECK ADD  CONSTRAINT [FK_maps_map_types] FOREIGN KEY([type_id])
REFERENCES [dbo].[map_types] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_map_types]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps] CHECK CONSTRAINT [FK_maps_map_types]
GO
/****** Object:  ForeignKey [FK_maps_users]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_users]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps]  WITH CHECK ADD  CONSTRAINT [FK_maps_users] FOREIGN KEY([author_id])
REFERENCES [dbo].[users] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_maps_users]') AND parent_object_id = OBJECT_ID(N'[dbo].[maps]'))
ALTER TABLE [dbo].[maps] CHECK CONSTRAINT [FK_maps_users]
GO
/****** Object:  ForeignKey [FK_remoteMaps_maps]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_remoteMaps_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[remoteMaps]'))
ALTER TABLE [dbo].[remoteMaps]  WITH CHECK ADD  CONSTRAINT [FK_remoteMaps_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_remoteMaps_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[remoteMaps]'))
ALTER TABLE [dbo].[remoteMaps] CHECK CONSTRAINT [FK_remoteMaps_maps]
GO
/****** Object:  ForeignKey [FK_remoteMaps_remoteServices]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_remoteMaps_remoteServices]') AND parent_object_id = OBJECT_ID(N'[dbo].[remoteMaps]'))
ALTER TABLE [dbo].[remoteMaps]  WITH CHECK ADD  CONSTRAINT [FK_remoteMaps_remoteServices] FOREIGN KEY([service_id])
REFERENCES [dbo].[remoteServices] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_remoteMaps_remoteServices]') AND parent_object_id = OBJECT_ID(N'[dbo].[remoteMaps]'))
ALTER TABLE [dbo].[remoteMaps] CHECK CONSTRAINT [FK_remoteMaps_remoteServices]
GO
/****** Object:  ForeignKey [FK_user_groups_groups]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_groups_groups]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_groups]'))
ALTER TABLE [dbo].[user_groups]  WITH CHECK ADD  CONSTRAINT [FK_user_groups_groups] FOREIGN KEY([group_id])
REFERENCES [dbo].[groups] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_groups_groups]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_groups]'))
ALTER TABLE [dbo].[user_groups] CHECK CONSTRAINT [FK_user_groups_groups]
GO
/****** Object:  ForeignKey [FK_user_groups_users]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_groups_users]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_groups]'))
ALTER TABLE [dbo].[user_groups]  WITH CHECK ADD  CONSTRAINT [FK_user_groups_users] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_groups_users]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_groups]'))
ALTER TABLE [dbo].[user_groups] CHECK CONSTRAINT [FK_user_groups_users]
GO
/****** Object:  ForeignKey [FK_user_responses_map_questions]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_responses_map_questions]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_responses]'))
ALTER TABLE [dbo].[user_responses]  WITH CHECK ADD  CONSTRAINT [FK_user_responses_map_questions] FOREIGN KEY([question_id])
REFERENCES [dbo].[map_questions] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_responses_map_questions]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_responses]'))
ALTER TABLE [dbo].[user_responses] CHECK CONSTRAINT [FK_user_responses_map_questions]
GO
/****** Object:  ForeignKey [FK_user_responses_user_sessions]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_responses_user_sessions]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_responses]'))
ALTER TABLE [dbo].[user_responses]  WITH CHECK ADD  CONSTRAINT [FK_user_responses_user_sessions] FOREIGN KEY([session_id])
REFERENCES [dbo].[user_sessions] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_responses_user_sessions]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_responses]'))
ALTER TABLE [dbo].[user_responses] CHECK CONSTRAINT [FK_user_responses_user_sessions]
GO
/****** Object:  ForeignKey [FK_user_sessiontraces_map_nodes]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_sessiontraces_map_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_sessiontraces]'))
ALTER TABLE [dbo].[user_sessiontraces]  WITH CHECK ADD  CONSTRAINT [FK_user_sessiontraces_map_nodes] FOREIGN KEY([node_id])
REFERENCES [dbo].[map_nodes] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_sessiontraces_map_nodes]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_sessiontraces]'))
ALTER TABLE [dbo].[user_sessiontraces] CHECK CONSTRAINT [FK_user_sessiontraces_map_nodes]
GO
/****** Object:  ForeignKey [FK_user_sessiontraces_maps]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_sessiontraces_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_sessiontraces]'))
ALTER TABLE [dbo].[user_sessiontraces]  WITH CHECK ADD  CONSTRAINT [FK_user_sessiontraces_maps] FOREIGN KEY([map_id])
REFERENCES [dbo].[maps] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_sessiontraces_maps]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_sessiontraces]'))
ALTER TABLE [dbo].[user_sessiontraces] CHECK CONSTRAINT [FK_user_sessiontraces_maps]
GO
/****** Object:  ForeignKey [FK_user_sessiontraces_user_sessions]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_sessiontraces_user_sessions]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_sessiontraces]'))
ALTER TABLE [dbo].[user_sessiontraces]  WITH CHECK ADD  CONSTRAINT [FK_user_sessiontraces_user_sessions] FOREIGN KEY([session_id])
REFERENCES [dbo].[user_sessions] ([id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_user_sessiontraces_user_sessions]') AND parent_object_id = OBJECT_ID(N'[dbo].[user_sessiontraces]'))
ALTER TABLE [dbo].[user_sessiontraces] CHECK CONSTRAINT [FK_user_sessiontraces_user_sessions]
GO
/****** Object:  ForeignKey [FK_users_languages]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_users_languages]') AND parent_object_id = OBJECT_ID(N'[dbo].[users]'))
ALTER TABLE [dbo].[users]  WITH CHECK ADD  CONSTRAINT [FK_users_languages] FOREIGN KEY([language_id])
REFERENCES [dbo].[languages] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_users_languages]') AND parent_object_id = OBJECT_ID(N'[dbo].[users]'))
ALTER TABLE [dbo].[users] CHECK CONSTRAINT [FK_users_languages]
GO
/****** Object:  ForeignKey [FK_users_user_types]    Script Date: 04/03/2012 18:40:54 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_users_user_types]') AND parent_object_id = OBJECT_ID(N'[dbo].[users]'))
ALTER TABLE [dbo].[users]  WITH CHECK ADD  CONSTRAINT [FK_users_user_types] FOREIGN KEY([type_id])
REFERENCES [dbo].[user_types] ([id])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_users_user_types]') AND parent_object_id = OBJECT_ID(N'[dbo].[users]'))
ALTER TABLE [dbo].[users] CHECK CONSTRAINT [FK_users_user_types]
GO
