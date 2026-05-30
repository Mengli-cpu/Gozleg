from collections import deque
maze = [
    ['S', 0, 1, 0, 0,0],
    [0,   0, 1, 0, 1,0],
    [1,   0, 0, 0, 0,0],
    [0,   1, 0, 1, 1,0],
    [0,   1, 0, 1, 1,0],
    [0,   0, 0, 0,1, 'E']
]

def find_path(maze):
    rows = len(maze)
    cols = len(maze[0])
    start = None
    for r in range(rows):
        for c in range(cols):
            if maze[r][c] == 'S':
                start = (r, c)
                break
                
    if not start:
        return "Start not found!"
    queue = deque([[start]])
    visited = {start}
    directions = [(-1, 0), (1, 0), (0, -1), (0, 1)]

    while queue:
        path = queue.popleft()
        curr_row, curr_col = path[-1]
        if maze[curr_row][curr_col] == 'E':
            return path
        for dr, dc in directions:
            nr, nc = curr_row + dr, curr_col + dc
            if 0 <= nr < rows and 0 <= nc < cols and maze[nr][nc] != 1:
                if (nr, nc) not in visited:
                    visited.add((nr, nc))
                    new_path = list(path)
                    new_path.append((nr, nc))
                    queue.append(new_path)

    return "Route not found!"
result_path = find_path(maze)

if isinstance(result_path, list):
    print("Route founded succesfully!")
    for r, c in result_path:
        if maze[r][c] != 'S' and maze[r][c] != 'E':
            maze[r][c] = '*'
            
    for row in maze:
        print(" ".join(str(cell) for cell in row))
else:
    print(result_path)