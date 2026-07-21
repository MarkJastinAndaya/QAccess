---
Project: QAcess
Domain: Identity
Artifact: Database Specification
Version: 1.1.0
Status: Approved
Author: QAcess Development Team
Last Updated: July 2026

Depends On:
  - Business Rules & Organizational Policies
  - Domain Model
  - Software Architecture
  - System Actors
  - Role & Permission Model

Produces:
  - identity.dbml
  - identity.sql
  - Identity Services
  - Authentication Module
---

# Identity Domain Specification

---

# 1. Overview

The Identity Domain establishes the foundation for authentication, authorization, and digital identity management within QAcess.

It is responsible for uniquely identifying every individual associated with the Quirinians' Student Organization (QSO), providing secure authentication, and controlling access to protected resources through Role-Based Access Control (RBAC).

The Identity Domain deliberately separates three independent concepts:

- Identity
- Authentication
- Authorization

This separation ensures that organizational changes do not directly affect software access while allowing authentication mechanisms to evolve independently from organizational data.

The Identity Domain serves as the entry point for all protected interactions within QAcess.

---

# 2. Purpose

The Identity Domain exists to answer three fundamental questions.

## Who is this person?

Handled by the **Members** table.

A Member represents the permanent identity of an individual within QAcess.

---

## Can this person access QAcess?

Handled by the **Users** table.

A User Account represents the authentication credentials required to access protected resources.

---

## What can this person do?

Handled by:

- Roles
- Permissions
- User Roles
- Role Permissions

Authorization is determined exclusively through assigned permissions.

---

# 3. Scope

The Identity Domain includes:

- Permanent Member Identity
- User Authentication
- User Accounts
- Password Management
- Role Management
- Permission Management
- Authorization Support
- Identity Audit Support

The Identity Domain does **not** include:

- Membership Renewals
- Academic Information
- Organization Positions
- Officer Appointments
- Events
- Attendance
- Announcements
- Documents
- Reports

These responsibilities belong to their respective domains.

---

# 4. Design Philosophy

The Identity Domain follows a security-first architecture.

Identity, authentication, and authorization are intentionally separated to reduce coupling between business data and security infrastructure.

Every authenticated request within QAcess ultimately depends on the Identity Domain.

The architecture is designed according to the following principles.

---

# 5. Design Principles

## Principle 1 — Permanent Identity

Every individual shall possess exactly one permanent Member record.

The Member record remains valid regardless of changes to membership status, academic information, or organizational appointments.

---

## Principle 2 — Authentication Separation

Authentication credentials shall never be stored within the Member record.

Passwords, usernames, and authentication states belong exclusively to the User Account.

---

## Principle 3 — Authorization Separation

Software permissions shall never depend directly upon organizational positions.

Organizational Positions describe responsibilities within QSO.

Roles describe permissions within QAcess.

---

## Principle 4 — Single User Account

Each Member may own zero or one User Account.

This allows members to exist within QAcess before receiving system access.

---

## Principle 5 — Role-Based Access Control

Authorization shall follow Role-Based Access Control (RBAC).

Users receive Roles.

Roles receive Permissions.

Permissions authorize system actions.

---

# 6. Domain Architecture

The Identity Domain consists of six primary tables.

| Table | Purpose |
|---------|---------|
| members | Permanent identity |
| users | Authentication accounts |
| roles | Software roles |
| permissions | Individual permissions |
| user_roles | User-role assignments |
| role_permissions | Role-permission assignments |

The relationships between these tables form the security foundation of QAcess.

---

# 7. Domain Responsibilities

The Identity Domain is responsible for:

- Maintaining permanent identities
- Authenticating users
- Securing passwords
- Managing authentication accounts
- Managing software roles
- Managing software permissions
- Assigning roles to users
- Assigning permissions to roles
- Supporting authorization
- Supporting future authentication mechanisms

---

# 8. Members Table

## Purpose

The Members table represents the permanent identity of an individual within QAcess.

A Member exists independently of authentication and organizational participation.

The Member table stores only information that describes the individual.

Information that changes across Academic Years belongs to Membership Terms and therefore does not exist within this table.

---

## Responsibilities

The Members table is responsible for:

- Personal Identity
- Contact Information
- Permanent Demographic Information

It is not responsible for:

- Authentication
- Academic Information
- Membership Status
- Officer Appointments
- Roles
- Permissions

---

## Planned Fields

- member_id
- member_uuid
- first_name
- middle_name
- last_name
- suffix
- birth_date
- sex_id
- primary_email
- primary_mobile
- facebook_url
- current_address
- version
- deleted_at
- created_at
- updated_at

---

## Notes

The Member table intentionally excludes:

- Username
- Password
- Roles
- Permissions
- School
- Program
- Year Level
- Enrollment Status

These belong to other domains.

# 9. Users Table

## Purpose

The Users table represents authentication accounts within QAcess.

Unlike the Members table, which represents the permanent identity of an individual, the Users table represents the ability of that individual to authenticate and access protected resources.

A User Account exists only when authentication is required.

Members without User Accounts remain valid organizational records.

---

## Responsibilities

The Users table is responsible for:

- Username
- Authentication Email
- Password Hash
- Account Status
- Email Verification
- Last Login
- Authentication Metadata

It is not responsible for:

- Personal Identity
- Academic Information
- Membership Status
- Organizational Position

---

## Planned Fields

- user_id
- user_uuid
- member_id
- username
- email
- password_hash
- account_status
- email_verified
- last_login_at
- version
- deleted_at
- created_at
- updated_at

---

## Notes

Authentication information shall never exist within the Members table.

Each User Account belongs to exactly one Member.

A Member may exist without a User Account.

---

# 10. Roles Table

## Purpose

Represents logical collections of software permissions.

Roles simplify authorization by grouping related permissions into reusable permission sets.

---

## Examples

- User
- Administrator
- Super Administrator

Future roles may be added without changing application code.

---

## Planned Fields

- role_id
- role_uuid
- role_name
- description
- is_system
- version
- deleted_at
- created_at
- updated_at

---

# 11. Permissions Table

## Purpose

Represents the smallest unit of authorization within QAcess.

Permissions authorize individual actions performed by users.

---

## Permission Naming Convention

Permissions follow the format:

```
module.action
```

Examples

```
members.view
members.create
members.update
members.archive

events.view
events.create
events.update

reports.export
```

---

## Planned Fields

- permission_id
- permission_uuid
- permission_key
- display_name
- description
- version
- deleted_at
- created_at
- updated_at

---

# 12. User Roles Table

## Purpose

Resolves the many-to-many relationship between Users and Roles.

Allows a single user to possess multiple software roles.

---

## Planned Fields

- user_role_id
- user_id
- role_id
- assigned_at

---

## Business Rule

Duplicate role assignments are prohibited.

The combination of:

```
user_id
role_id
```

must remain unique.

---

# 13. Role Permissions Table

## Purpose

Resolves the many-to-many relationship between Roles and Permissions.

Allows multiple permissions to be assigned to one role.

---

## Planned Fields

- role_permission_id
- role_id
- permission_id

---

## Business Rule

Duplicate permission assignments are prohibited.

The combination of:

```
role_id
permission_id
```

must remain unique.

---

# 14. Relationships

The Identity Domain follows the relationships below.

```
Members

1 -------- 0..1 Users

Users

1 -------- M User Roles

Roles

1 -------- M User Roles

Roles

1 -------- M Role Permissions

Permissions

1 -------- M Role Permissions
```

---

# 15. Business Rules

The Identity Domain implements the following business rules.

### ID-001

A Member shall exist only once within QAcess.

---

### ID-002

A Member may exist without a User Account.

---

### ID-003

A User Account cannot exist without an associated Member.

---

### ID-004

Each User Account belongs to exactly one Member.

---

### ID-005

Usernames shall be unique.

---

### ID-006

Authentication email addresses shall be unique.

---

### ID-007

Passwords shall never be stored in plain text.

---

### ID-008

Passwords shall always be stored using secure password hashing.

---

### ID-009

Authorization shall be determined exclusively through Roles and Permissions.

---

### ID-010

Organizational Positions shall never determine software permissions.

---

### ID-011

Users may possess multiple Roles.

---

### ID-012

Roles may possess multiple Permissions.

---

### ID-013

Permission assignments are cumulative.

---

# 16. Database Standards

The Identity Domain follows the QAcess Database Standards.

## Primary Keys

- BIGINT UNSIGNED AUTO_INCREMENT

---

## Public Identifiers

All major business tables include UUIDs.

---

## Audit Fields

Business tables include:

- created_at
- updated_at

---

## Optimistic Locking

Editable tables include:

```
version
```

---

## Soft Delete

Business tables implement:

```
deleted_at
```

---

## Storage Engine

InnoDB

---

## Character Encoding

utf8mb4

---

# 17. Security Principles

The Identity Domain follows the following security principles.

- Authentication is centralized.
- Authorization is centralized.
- Passwords are hashed.
- RBAC is enforced for every protected request.
- Authentication data is isolated from Member identity.
- Every authorization decision is permission-based.

---

# 18. Engineering Notes

The Identity Domain is intentionally isolated from the remaining domains.

Other domains reference Members rather than Users whenever business information is involved.

Authentication remains a technical concern.

Membership remains a business concern.

This separation reduces coupling and improves long-term maintainability.

The Identity Domain is expected to change infrequently once deployed.

---

# 19. Future Expansion

The architecture supports future implementation of:

- Multi-Factor Authentication
- OAuth Providers
- Google Authentication
- Microsoft Authentication
- Mobile Authentication
- API Tokens
- Passwordless Login
- Single Sign-On (SSO)

No structural redesign should be required.

---

# 20. Summary

The Identity Domain establishes the authentication and authorization foundation of QAcess.

By separating Member Identity, Authentication, and Authorization into independent components, the system achieves:

- Improved maintainability
- Enhanced security
- Flexible authorization
- Clear architectural boundaries
- Future scalability

This document serves as the authoritative specification for the Identity Domain.

Any modifications to the Identity Domain shall be reflected first in this specification before updating the corresponding DBML, SQL schema, or application code.

---

# Document Status

Project: QAcess

Artifact: Identity Domain Specification

Version: 1.1.0

Status: Approved

Next Artifact:

database/dbml/identity.dbml
