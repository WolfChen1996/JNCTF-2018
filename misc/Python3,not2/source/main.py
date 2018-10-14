import base64

FLAG="JNCTF{New_BAS3_new_lif3}"

print (base64.b32encode(base64.b16encode(base64.b85encode(base64.b64encode(b'JNCTF{New_BAS3_new_lif3}')))))