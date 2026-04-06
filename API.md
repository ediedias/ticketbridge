# TicketBridge API Documentation

Base URL: `https://ticketbridge.blogtitle.info/api`

## Authentication

### POST /auth/register
Register a new user account.
```json
{
  "name": "John Doe",
  "email": "john@example.com", 
  "password": "password123",
  "password_confirmation": "password123"
}
```

### POST /auth/login
Login and get auth token.
```json
{
  "email": "john@example.com",
  "password": "password123"
}
```

### GET /auth/me
Get current user info (requires auth token).

### POST /auth/logout
Logout current session (requires auth token).

## Projects (Protected Routes)

### GET /projects
List all projects for authenticated user.

### POST /projects
Create new project.
```json
{
  "name": "My Website",
  "description": "Main company website"
}
```

### GET /projects/{id}
Get single project details.

### PUT /projects/{id}
Update project.

### DELETE /projects/{id}
Delete project.

## Tickets (Protected Routes)

### GET /projects/{project}/tickets
List tickets for a project.

### GET /projects/{project}/tickets/{ticket}
Get single ticket details.

### PATCH /projects/{project}/tickets/{ticket}
Update ticket status/priority.
```json
{
  "status": "in_progress",
  "priority": "high"
}
```

## Bug Report Management (Protected Routes)

### GET /projects/{project}/bug-reports/stats
Get bug report statistics for project.

### GET /projects/{project}/embed-code
Get widget embed code for project.

## Widget Endpoints (Public)

### POST /widget/conversations/start
Start new bug report conversation.
```json
{
  "api_key": "project-uuid",
  "message": "The login page is not working",
  "client_info": {
    "browser": "Chrome 120",
    "device": "Desktop",
    "url": "https://example.com/login"
  }
}
```

### POST /widget/conversations/reply
Reply to ongoing conversation.
```json
{
  "api_key": "project-uuid", 
  "session_id": "conversation-uuid",
  "message": "I get a 500 error when clicking submit"
}
```

### POST /widget/status
Check conversation/ticket status.
```json
{
  "api_key": "project-uuid",
  "session_id": "conversation-uuid"
}
```

## Test Endpoints

### GET /health
API health check.

### GET /test/database
Database connectivity test.

## Authentication

Protected routes require Bearer token in Authorization header:
```
Authorization: Bearer {token}
```

Widget endpoints authenticate via `api_key` in request body.